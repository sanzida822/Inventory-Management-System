<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductAll()
    {

        $product = Product::latest()->get();
    //    print_r($product);
        return view('backend.product.product_all', compact('product'));
    }

    public function ProductAdd(Request $request)
    {
        // $product=Product::latest()->get();
        $category = Category::all();

        //$product=Product::all();
        $unit = Unit::all();
        $supplier = Supplier::all();

        return view('backend.product.product_add', compact('category', 'supplier', 'unit'));
    }

    public function ProductStore(Request $request)
    {
    //    dd($request->supplier_id);
    //     if($request->suppl_id==''){
    //         $notification = array(
    //             'message' => 'Supplier name must be needed',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('product.add')->with($notification);
    //     }
    //     if($request->unitdata->id==''){
    //         $notification = array(
    //             'message' => 'Unit name must be needed',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('product.add')->with($notification);
    //     }
    //     if($request->categorydata->id==''){
    //         $notification = array(
    //             'message' => 'Category name must be needed',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('product.add')->with($notification);
    //     }
        try{
            Product::insert([
                'name' => $request->name,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'category_id' => $request->category_id,
                'quantity' => '0',
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Supplier product already exists',
                'alert-type'=>'error'
            );
            return redirect()->route('product.add')->with($notification);
        }
  
       
      }
       

        $notification = array(
            'message' => 'Product added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id)
    {
        $category = Category::all();
        $unit = Unit::all();
        $supplier = Supplier::all();
        $product=Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','category','supplier','unit'));
    }


    public function ProductUpdate(Request $request){
       $product=Product::findOrFail($request->id);
   try{
    Product::findOrFail($request->id)->update([
        'name'=>$request->name,
        'supplier_id'=>$request->supplier_id,
        'unit_id'=>$request->unit_id,
        'category_id'=>$request->category_id,
        'updated_by'=>Auth::user()->id,
        'updated_at'=>Carbon::now(),
       ]);

   }catch(\Illuminate\Database\QueryException $e){ 
    $errorCode = $e->errorInfo[1];
    if($errorCode == 1062){
        $notification=array(
            'message'=>'Supplier product already exists',
            'alert-type'=>'error'
        );
        return redirect()->route('product.edit',$request->id)->with($notification);
    }

   
  }



     

       $notification = array(
        'message' => 'Product Updates successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('product.all')->with($notification);
    }



    public function ProductDelete($id){
        // $product=Product::findOrFail($request->id);
 
        Product::findOrFail($id)->delete();
      
 
 
        $notification = array(
         'message' => 'Product Deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('product.all')->with($notification);
     }
}