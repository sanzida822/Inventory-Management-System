<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentDetail;
use App\Models\Payment;
use App\Models\Customer as ModelsCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

class CustomerController extends Controller
{


    public function CustomerAll()
    {
        $customer = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customer'));
    }

    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }



    public function CustomerStore(Request $request)
    {
        $image = $request->file('customer_image');
        // $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        // ]);
        // return redirect()->back();

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = "upload/customer/" . $name_gen;
try{
    Customer::insert([
        'name' => $request->name,
        'mobile_number' => $request->mobile_number,
        'email' => $request->email,
        'address' => $request->address,
        'customer_image' => $save_url,
        'created_by' => Auth::user()->id,
        'created_at' => Carbon::now()

    ]);
}catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Customer Mobile Number Already Exists',
                'alert-type'=>'error'
            );
            return redirect()->route('customer.add')->with($notification);
        }
  
       
      }

       
        $notification = array(
            'message' => "Customer Inserted Successfully",
            'alert-type' => "success"
        );
        return redirect()->route('customer.all')->with($notification);
    }

    public function CustomerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    // update customer
    public function CustomerUpdate(Request $request)
    {
        $image = $request->file('customer_image');
        //     if ($request->file('customer_image')) {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        //     ]);
        //     return redirect()->back();
        // }
        if ($request->file('customer_image')) {

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
            $save_url = "upload/customer/" . $name_gen;
            $customer = $request->id;
            try{
                Customer::findOrFail($customer)->update(
                    [
                        'name' => $request->name,
                        'customer_image' => $save_url,
                        'mobile_number' => $request->mobile_number,
                        'email' => $request->email,
                        'address' => $request->address,
                        'updated_by' => Auth::user()->id,
                        'updated_at' => Carbon::now()
                    ]
                );
            }

            catch(\Illuminate\Database\QueryException $e){ 
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    $notification=array(
                        'message'=>'Customer Mobile Number Already Exists',
                        'alert-type'=>'error'
                    );
                    return redirect()->route('customer.edit',$request->id)->with($notification);
                }
          
               
              }
        
       
        }
        $notification = array(
            'message' => "Customer Updated Successfully",
            'alert-type' => "success"
        );
        return redirect()->route('customer.all')->with($notification);
    }

    public function CustomerDelete($id)
    {
 
        $customer=Customer::findOrFail($id);
        $img=$customer->customer_image;
        unlink($img);
        
        Customer::findOrFail($id)->delete();
        $notification = array(
            'message' => "Customer record deleted successfully",
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    }

  

    public function CustomerEditInvoice($invoiceId){
        $payment=Payment::where('invoice_id',$invoiceId)->first();
        return view('backend.customer.customerEditInvoice',compact('payment'));

    }
    public function CustomerUpdateInvoice(Request $request){
       if($request->prev_due_amount<$request->partial_amount){
        $notification = array(
            'message' => 'You Provide Max Value',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

       }
       else{
        $payment=Payment::where('invoice_id',$request->invoice_id)->first();
        $paymentDetails=new PaymentDetail();
        $payment->paid_status=$request->payment_status;
        if($request->payment_status=='Full_Paid'){
            $payment->paid_amount=Payment::where('invoice_id',$request->invoice_id)->first()['paid_amount']+
            $request->prev_due_amount;
            $payment->due_amount=0;
            $paymentDetails->current_paid_amount=$request->prev_due_amount;
            
        }
        elseif($request->payment_status=='Partial_Paid'){
            $payment->paid_amount=Payment::where('invoice_id',$request->invoice_id)->first()['paid_amount']+$request->partial_amount;
            $payment->due_amount=Payment::where('invoice_id',$request->invoice_id)->first()['due_amount']-$request->partial_amount;
            $paymentDetails->current_paid_amount=$request->partial_amount;
            
        }
        $payment->save();

        $paymentDetails->invoice_id=$request->invoice_id;
        $paymentDetails->date=date('Y-m-d',strtotime('$request->date'));
        $paymentDetails->updated_by=Auth::user()->id;
        $paymentDetails->save();
        
        $notification = array(
            'message' => 'Customer credit updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.credit')->with($notification); 
       }

      
    }
    public function CustomerCredit(){ //baki tk
        $alldata=Payment::whereIn('paid_status',['Full_Due','Partial_Paid'])->latest()->get();
        return view('backend.customer.customer_credit_report',compact('alldata'));
    }
    public function CustomerPaid(){ //dewa tk
        $alldata=Payment::where('paid_status','!=','Full_Due')->latest()->get();
     
        return view('backend.customer.customer_paid_report',compact('alldata'));
        
    }

    public function CustomerCreditReport(){
        $alldata=Customer::all();
       
        return view('backend.customer.customerwise_credit_report',compact('alldata'));
    }

    public function CustomerWiseReport(Request $request){
        $id=$request->customer_id;
    
        $alldata=Payment::where('customer_id',$id)->get();
      
        return view('backend.pdfGenerate.customerwise_report',compact('alldata'));
    }
}