<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AjxController extends Controller
{
  public function GetCategory(Request $request)
  {
    $supp_id = $request->supplier_id;
    $allcategory = Product::with(['category'])->select('category_id')->where('supplier_id', $supp_id)->groupBy('category_id')->get();
 
    return response()->json($allcategory);
  }


  public function GetProduct(Request $request)
  {
    $category_id = $request->category_id;
    $allproduct = Product::where('category_id', $category_id)->get();

    return response()->json($allproduct);
  }

  public function GetProductStrock(Request $request)
  {
    $product_id= $request->product_id;
    $stockquantity = Product::where('id', $product_id)->first()->quantity;

    return response()->json($stockquantity);
  }
}
