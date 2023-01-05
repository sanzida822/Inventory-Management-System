<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceDetail;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;

class ManageStockController extends Controller
{
    public function StockReport(){
        $product=Product::orderBy('id','desc')->get();
        return view('backend.stock.stockreport',compact('product'));
    }

    public function StockReportPrint(){
        $product=Product::orderBy('id','desc')->get();
         return view('backend.pdfGenerate.stockreportgenerate',compact('product'));
    }
    
    public function ProductStockReport(){
        $category=Category::all();
           return view('backend.stock.product_wise_stock_report',compact('category'));
        }

        public function ProductStockReportPrint(Request $request){
           $product=Product::where('id',$request->product_id)->get();
         
           return view('backend.pdfGenerate.productwise_stock_pdf',compact('product')); 

        }
    }