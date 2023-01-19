<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function CategoryAll(){
     $category=Category::latest()->get();
     return view('backend.category.category_all',compact('category'));

    }



    public function CategoryAdd(){
        return view('backend.category.category_add');
    }

public function CategoryStore(Request $request){
    try{
        Category::insert([
            'name'=>$request->name,
           'created_by'=>Auth::user()->id,
           'created_at'=>Carbon::now(),
           
        ]);
    }catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Category Already Exists',
                'alert-type'=>'error'
            );
            return redirect()->route('category.add')->with($notification);
        }
  
       
      }
 
    $notification=array(
        'message'=>'Category added successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('category.all')->with($notification);
    }


    
    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $category=$request->id;
        try{
            Category::findOrFail($category)->update([
                'name'=>$request->name,
               'updated_by'=>Auth::user()->id,
               'updated_at'=>Carbon::now(),
                   ]);
               
        }catch(\Illuminate\Database\QueryException $e){ 
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $notification=array(
                    'message'=>'Category Already Exists',
                    'alert-type'=>'error'
                );
                return redirect()->route('category.edit',$request->id)->with($notification);
            }
        
           
          }
   
   
   
    $notification=array(
        'message'=>'Category Updated successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('category.all')->with($notification);
    }


    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    

}