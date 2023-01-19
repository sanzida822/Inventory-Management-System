<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SupplierController extends Controller
{
    public function SupplierAll(){
             $supplier=Supplier::latest()->get();
             return view('backend.supplier.supplier_all',compact('supplier'));

    }
    public function SupplierAdd(){
        $supplier=Supplier::latest()->get();
        return view('backend.supplier.supplier_add');

}
public function SupplierStore(Request $request){
    try{
        Supplier::insert([
            'name'=>$request->name,
           'mobile_number'=>$request->mobile,
           'email'=>$request->email,
           'address'=>$request->address,
           'created_by'=>Auth::user()->id,
           'created_at'=>Carbon::now(),
           
        ]);
    }catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Supplier Already Exists',
                'alert-type'=>'error'
            );
            return redirect()->route('supplier.add')->with($notification);
        }
  
       
      }

$notification=array(
    'message'=>'Supplier added successfully',
    'alert-type'=>'success'
);
return redirect()->route('supplier.all')->with($notification);
}


public function SupplierEdit($id){
    $supplier=Supplier::findOrFail($id);
    return view('backend.supplier.supplier_edit',compact('supplier'));

}

public function SupplierUpdate(Request $request){
    $supplier=$request->id;
   
    try{
        Supplier::findOrFail($supplier)->update([
            'name'=>$request->name,
           'mobile_number'=>$request->mobile,
           'email'=>$request->email,
           'address'=>$request->address,
           'updated_by'=>Auth::user()->id,
           'updated_at'=>Carbon::now(),
               ]);

    }catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Supplier Already Exists',
                'alert-type'=>'error'
            );
            return redirect()->route('supplier.edit',$request->id)->with($notification);
        }
  
       
      }
 

$notification=array(
    'message'=>'Supplier Updated successfully',
    'alert-type'=>'success'
);
return redirect()->route('supplier.all')->with($notification);
}


public function SupplierDelete($id){
    Supplier::findOrFail($id)->delete();
    $notification=array(
        'message'=>'Supplier Deleted Successfully',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
}


}