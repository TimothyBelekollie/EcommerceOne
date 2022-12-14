<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

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
    public function AdminProfileStore(Request $request){

        $data=Admin::find(1);
        $data->name=$request->name;
        $data->email=$request->email;
       if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_photo_path']=$filename;
       }
       $data->save();
       $notification= array(
        'message'=>'Profile Updated Successfully',
        'alert-type'=>'success'

    );
    return redirect()->route('admin.Profile')->with($notification);
    }//end method

    public function AdminChangePassword(){

        return view('admin.admin_password_change');
    }
    public function AdminUpdatePassword(Request $request){
        $validateData=$request->validate(
            [
                'oldpassword'=>'required',
                'password'=>'required|confirmed',

            ],
        );

        $hashedPassword=Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin=Admin::find(1);
            $admin->password=Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $notification=array(
                'message'=>'You have successfully change your password',
                'alert-type'=>'success'
            );
            return redirect()->route('admin.logout')->with($notification);

        }
        else{
            $notification=array(
                'message'=>"The password you enter does not match the old password",
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);
        }

    }
}
