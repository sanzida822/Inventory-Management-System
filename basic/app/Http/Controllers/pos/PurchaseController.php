<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function PurchaseAll()
    {
        $alldata = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.purchase_all', compact('alldata'));
    }


    public function PurchaseAdd()
    {
        $date=date('Y-m-d');
        $product = Product::all();
        $category = Category::all();
        $supplier = Supplier::all();
        $unit = Unit::all();

        return view('backend.purchase.purchase_add', compact('product', 'category', 'supplier', 'unit','date'));
    }


    public function PurchaseStore(Request $request)
    {
        if ($request->category_id == null) {
            $notification = array(
                'message' => 'Sorry you did not select any category',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        if ($request->buying_qty == null) {
            $notification = array(
                'message' => 'Sorry buying quantity can not be null',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {

                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
             
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->created_at = Carbon::now();
                $purchase->status = '0';
                $purchase->save();
            }

            $notification = array(
                'message' => 'Data saved successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }
    }

    public function PurchaseDelete($id)
    {
        Purchase::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Purchase record Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function PurchasePending()
    {
        $alldata = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.pending_all', compact('alldata'));
    }

    public function PurchaseApprove($id)
    {
        $purchase = Purchase::findOrFail($id);
        $product =    Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity=$purchase_qty;
        if($product->save()){
            Purchase::findOrFail($id)->update([
                'status'=>'1'
            ]);
        }
        $notification = array(
            'message' => 'Status Approved',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.all')->with($notification);
    }

    public function DailyPurchaseReport(){
          return view('backend.purchase.daily_purchase_report');

    }
    public function DailyPurchaseReportPDF(Request $request){
        $sdate=date('Y-m-d',strtotime($request->startdate));
        $edate=date('Y-m-d',strtotime($request->enddate));

        $details=Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->orderBy('date','desc')->get();
   
        return view('backend.pdfGenerate.daily_purchase_pdf',compact('details','sdate','edate'));

    }
}
