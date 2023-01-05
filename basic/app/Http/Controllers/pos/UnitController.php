<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class UnitController extends Controller
{
    public function UnitAll()
    {

        $unit = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('unit'));
    }

    public function UnitAdd()
    {
        return view('backend.unit.unit_add');;
    }


    public function UnitStore(Request $request)
    {
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Unit added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('unit.all')->with($notification);
    }



    public function UnitEdit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }


    public function UnitUpdate(Request $request)
    {


        $unit = $request->id;

        Unit::findOrFail($unit)->update([
            'name' => $request->name,
     
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('unit.all')->with($notification);
    }

    public function UnitDelete($id){
     $unit=Unit::findOrFail($id)->delete();

     
     $notification = array(
        'message' => 'Unit has been successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('unit.all')->with($notification);

    }
}
