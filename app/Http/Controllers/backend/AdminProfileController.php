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
}