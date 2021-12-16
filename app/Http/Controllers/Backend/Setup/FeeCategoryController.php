<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.category_fee.view_cateogry_fee',$data);
    }

    public function FeeCategoryAdd(){
        return view('backend.setup.category_fee.add_cateogry_fee');
    }


    public function FeeCategoryStore(Request $request){
        $validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name',
    		
    	]);

        $data = new FeeCategory();
        $data->name = $request->name;
        
        $data->save();

        $notification = array(
            'message' => 'Student Fee Category Insert Successfully',
            'alert-type' => 'info'
        );         
        return redirect()->route('fee.cateogry.view')->with($notification);

    }

    public function FeeCategoryEdit($id){
        $editData = FeeCategory::find($id);
        return view('backend.setup.category_fee.edit_cateogry_fee',compact('editData'));
    }


    public function FeeCategoryUpdate(Request $request,$id){
        
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name,'.$data->id
    		
    	]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Fee Category Updated Successfully',
            'alert-type' => 'info'
        );         
        return redirect()->route('fee.cateogry.view')->with($notification);

    }


    public function FeeCategoryDelete($id){
        $data = FeeCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Fee Category Deleted Successfully',
            'alert-type' => 'error'
        );         
        return redirect()->route('fee.cateogry.view')->with($notification);
    }

}
