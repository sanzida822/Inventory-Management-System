<?php

namespace App\Http\Controllers\pos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\InvoiceDetail;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ManageInvoiceController extends Controller
{
    public function InvoiceAll(){
        $alldata=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.invoice.invoice_all',compact('alldata'));

    }

    public function InvoiceAdd(){

        $category = Category::all();
        $customer=Customer::all();
        $date=date('Y-m-d');
      

        $invoice_data=Invoice::orderBy('id','desc')->first();
        if($invoice_data==null){
            $invoice_no='1';
        }else{
          $invoice_data=Invoice::orderBy('id','desc')->first()->id;  
          $invoice_no=  $invoice_data+1;  

        }

        return view('backend.invoice.InvoiceAdd', compact('invoice_no', 'category','date','customer'));

    }
    public function StoreInvoicedata(Request $request){
       
          if($request->category_id==null){
            $notification = array(
                'message' => 'Sorry you didnot select  item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
          elseif($request->product_id==null){
            $notification = array(
                'message' => 'Sorry you didnot select  item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
          elseif($request->calculate_amount<$request->partial_amount){
            $notification = array(
                'message' => 'Sorry partial payment is maximum than total amount',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
          else{
         $invoice=new Invoice();
         $invoice->invoice_no=$request->invoice_no;
         $invoice->description=$request->description;
         $invoice->date=date('Y-m-d',strtotime($request->date));
         $invoice->created_by=Auth::user()->id;
         $invoice->created_at=Carbon::now();
         $invoice->status='0';

     

         DB::transaction(function() use($request,$invoice){
                 if($invoice->save()){
                    $count= count($request->category_id);
          
                    for ($i=0; $i < $count; $i++) { 
          
                        $invoice_detail=new InvoiceDetail();
                        $invoice_detail->date=date('Y-m-d',strtotime($request->date));
           

                        $invoice_detail->category_id=$request->category_id[$i];

                        $invoice_detail->invoice_id=$invoice->id;
                   
                        $invoice_detail->product_id=$request->product_id[$i];
                        $invoice_detail->selling_qty=$request->selling_qty[$i];
                        $invoice_detail->unit_price=$request->unit_price[$i];
                        $invoice_detail->selling_price=$request->selling_price[$i];
                        $invoice_detail->status='0';
                        $invoice_detail->created_at=Carbon::now();

                        $invoice_detail->save();
                        # code...
                    }
                 }

                 if($request->customer_id=='0'){ 
                    $customer=new Customer();

                    $customer->name=$request->customer_name;
                    
                    $customer->email=$request->customer_email;
                    
                    $customer->mobile_number=$request->customer_mobile;
                    
                    $customer->created_by=Auth::user()->id;
                    
                    $customer->created_at=Carbon::now();

                    $customer_id=$customer->id;
                    $customer->save();

              
                 }else{
                    $customer_id=$request->customer_id;
                 }
                 $payment=new Payment();
                 $paymentDe=new PaymentDetail();

                 $payment->invoice_id=$invoice->id;
                 $payment->customer_id=$customer_id;
                 
                 if($request->payment_status=='Full_Paid'){
                    $payment->paid_status=$request->payment_status;
                    $payment->paid_amount=$request->calculate_amount;
                    $payment->due_amount='0';

                    $paymentDe->current_paid_amount=$request->calculate_amount;

                 }
                 elseif($request->payment_status=='Partial_Paid'){
                    $payment->paid_status=$request->payment_status;
                    $payment->paid_amount=$request->partial_amount;
                    $payment->due_amount=$request->calculate_amount-$request->partial_amount;

                    $paymentDe->current_paid_amount=$request->partial_amount;
                 }
                 elseif($request->payment_status=='Full_Due'){
                    $payment->paid_status=$request->payment_status;
                    $payment->paid_amount='0';
                    $payment->due_amount=$request->calculate_amount;

                    $paymentDe->current_paid_amount='0';

                 }


                 $payment->customer_id=$customer_id;
                 $payment->total_amount=$request->calculate_amount;
                 $payment->save();

                 //payment detail table
                 $paymentDe->invoice_id=$invoice->id;
                 $paymentDe->date=date('Y-m-d',strtotime($request->date));
              
                 $paymentDe->save();




        });

         
         
          
    }
    $notification = array(
        'message' => 'Data inserted successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('invoice.pending')->with($notification);
}


public function InvoiceDelete($id){
    $invoice=Invoice::findOrFail($id);
    $invoice->delete();
    InvoiceDetail::where('invoice_id',$invoice->id)->delete();
    Payment::where('invoice_id',$invoice->id)->delete();
    PaymentDetail::where('invoice_id',$invoice->id)->delete();
    $notification = array(
        'message' => 'Data Deleted successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}

public function InvoicePending(){
    $alldata=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
    return view('backend.invoice.invoice_pending',compact('alldata'));
}

public function InvoiceApprove($id){
    $invoice=Invoice::with('invoice_detail')->FindOrFail($id);
    $invoice_no=Invoice::find($id)->invoice_no ;//pass invoice number to show it in invoice approve class
 
    return view('backend.invoice.invoice_approve',compact('invoice','invoice_no'));
}

public function StockCheck(Request $request){   //aprrove invoice
  foreach ($request->selling_qty as $key => $value) {
    $invoice_detail=InvoiceDetail::where('id',$key)->first();
 
    $product=Product::where('id',$invoice_detail->product_id)->first();
    if($product->quantity < $request->selling_qty[$key]){
        // print_r($key);
        // print_r("id:");
        // print_r($invoice_detail->product_id);
        // print_r("q:");
        // print_r($product->quantity);
        // print_r(":");
        // print_r($request->selling_qty[$key]);
        // print_r($product->quantity - $request->selling_qty[$key]);
        // dd();
        // print_r($product->name );
        // print_r(":");
        // print_r($product->quantity);
        // print_r($request->selling_qty[$key]);

    
        $notification = array(
            'message' => 'Sorry you approve max product',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

  }

  $invoice=Invoice::findOrFail($request->id);
  $invoice->status="1";

  $product=Product::where('id','$request->id');
  DB::transaction(function() use ($request,$invoice){
    foreach($request->selling_qty as $key=>$value){
        $invoice_detail=InvoiceDetail::where('id',$key)->first();
        $invoice_detail->status='1';
      $invoice_detail->save();

        $product=Product::where('id',$invoice_detail->product_id)->first();
        $productQuantity=((float)$product->quantity)-((float)$request->selling_qty[$key]);  //after approve redure product quantity
       $product->quantity=$productQuantity;
        $product->save();

    }
$invoice->save();

  });
  $notification = array(
    'message' => 'Invoice Approve Successfully',
    'alert-type' => 'success'
);
return redirect()->route('invoice.pending')->with($notification);

}


public function InvoicePrint(){
    $alldata=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.invoice.invoice_print',compact('alldata'));
}

public function InvoicePdfPrint($id){
    $invoice=Invoice::with('invoice_detail')->FindOrFail($id);
   
    return view('backend.pdfGenerate.invoice_pdf_gen',compact('invoice'));
}

public function DailyInvoiceReport(){
   
    return view('backend.invoice.daily_invoice');


}
public function DailyInvoicePdf(Request $request){
   $sdate=date('Y-m-d',strtotime($request->startdate));

   $edate=date('Y-m-d',strtotime($request->enddate));
  
   $details=Invoice::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
   
   return view('backend.pdfGenerate.daily_invoice_pdf',compact('details','sdate','edate'));
  
 

}

}