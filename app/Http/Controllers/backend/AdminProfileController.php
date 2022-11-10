<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile(){

        $adminData=Admin::find(1);

        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function AdminProfileEdit(){

        $editData=Admin::find(1);

        return view('admin.admin_profile_edit',compact('editData'));
    }
    public function AdminProfilePost(Request $request){

        $data=Admin::find(1);
        $data->name=$request->name;
        $data->email=$request->email;
       if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        $filename=date('YmdHi').$file->getClientOriginalName();
       }

        return view('admin.admin_profile_view',compact('editData'));
    }//end method
}
