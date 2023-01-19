<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
  public function GetSupplierProduct(Request $request)
  {
    $category_id = $request->category_id;
    $supplier_id=$request->supplier_id;
    $allproduct = Product::where('category_id', $category_id)->where('supplier_id',$supplier_id)->get();

    return response()->json($allproduct);
  }
  
  public function GetProductStrock(Request $request)
  {
    $product_id= $request->product_id;
    $stockquantity = Product::where('id', $product_id)->first()->quantity;

    return response()->json($stockquantity);
  }



  public function GetOldPassword(Request $request){
   
    $oldpass=$request->oldpass;
    // $hashpass=Hash::make($oldpass);
   
    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    // $prevpassword=User::where('id',Auth::user()->id)->first()->password;
   // print_r($prevpassword);
    //  if($prevpassword==$hashpass){
    //   $match="Old Password not matched";
    //  }
    if(Hash::check($oldpass,Auth::user()->password)){
      $match="";
    }
  else{
    $match="Old Password not Matched";
  }

     return response()->json($match);
  
  }
  


  public function MatchTwoPass(Request $request){
    $new_pass=$request->new_pass;
    $confirm_pass=$request->confirm_pass;
//     if(Str::length($new_pass)<8){
//      $match="Password length must be at least 8 characters";
//     }
// else{
  if($new_pass!=$confirm_pass){
    $match="Confirm Password not Matched with New Password";
  }else{
    $match="";
  // }
}
    
    return response()->json($match);
  }

  public function checkNewPassLen(Request $request){
    $password=$request->new_pass;
   
    if(Str::length($password)<8){
      $match="Password length must be at least 8 characters";
     }else{
      $match="";
     }
     return response()->json($match);
  }
}