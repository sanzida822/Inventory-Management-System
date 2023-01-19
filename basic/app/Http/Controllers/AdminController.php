<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Illuminate\Database\QueryException;

class AdminController extends Controller
{
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method 


    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    }// End Method 


    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }// End Method 

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
   

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);

    }// End Method


    public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method


    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);
        if(Str::length($request->newpassword)<8){
            $notification=array(
                'message'=>'Password must be at least 8 characters',
                'alert-type'=>'error'
            );
            return redirect()->route('change.password')->with($notification);  
        }
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }

    }// End Method

public function AdminAll(){   
     $ownId=Auth::user()->id;
    
    $admin=User::where('id','!=',$ownId)->latest()->get();
   // $superAdmin=Auth::user()->status; 
    $superAdmin=Auth::user()->status;  //know if an admin is superadmin or not
   


    return view('backend.admin.admin_all',compact('admin','superAdmin'));
}

public function AdminAdd(){
    return view('backend.admin.admin_add');

}

public function AdminStore(Request $request){
    $password=$request->password;
    if(Str::length($password)<8){
        $notification=array(
            'message'=>'Password must be at least 8 characters',
            'alert-type'=>'error'
        );
        return redirect()->route('admin.add')->with($notification);  
    }
   
    try{
        $user=new User();
        $user->name=$request->name;
       // $user->username=$request->username;
        $user->email=$request->email;
        $user->email_verified_at=Carbon::now();
        
        $user->password=Hash::make($request->password);
      //  $user->created_by=User::get()->id;
        $user->created_at=Carbon::now();
        $user->status='0';
        $user->save();
    }catch(\Illuminate\Database\QueryException $e){ 
        $errorCode = $e->errorInfo[1];
        if($errorCode == 1062){
            $notification=array(
                'message'=>'Admin Email Already Exists',
                'alert-type'=>'error'
            );
            return redirect()->route('admin.add')->with($notification);
        }
  
       
      }
    
     
    
      $notification=array(
        'message'=>'Admin added successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('admin.all')->with($notification);


}
public function AdminDelete($id){
    $user=new User();
    $user->findOrFail($id)->delete();
    $notification=array(
        'message'=>'Admin Deleted successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('admin.all')->with($notification);
}

public function AdminEdit($id){
$admin=User::findOrFail($id);
return view('backend.admin.admin_edit',compact('admin'));
}

// public function AdminUpdate(Request $request){
//     $id=$request->id;
//     $user=new User();

// }

}