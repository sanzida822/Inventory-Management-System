<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Customer as ModelsCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

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

        Customer::insert([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()

        ]);
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
}
