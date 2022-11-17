<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //
    public function Index(){
        return view('frontend.index');
    }
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserProfile(){
$id=Auth::user()->id;
$user=User::find($id);

        return view('frontend.profile.user_profile',compact('user'));
    }
    public function UserProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
       if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
       @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$filename);
        $data['profile_photo_path']=$filename;
       }
       $data->save();
       $notification= array(
        'message'=>'Profile Updated Successfully',
        'alert-type'=>'success'

                          );
    return redirect()->route('dashboard')->with($notification);
    }
    public function UserChangePassword(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }
    public function UserStorePassword(Request $request){
        $validateData=$request->validate(
            [
                'oldpassword'=>'required',
                'password'=>'required|confirmed',

            ],
        );
          $id=Auth::user()->id;
        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin=User::find($id);
            $admin->password=Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $notification=array(
                'message'=>'You have successfully change your password',
                'alert-type'=>'success'
            );
            return redirect()->route('login')->with($notification);

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
