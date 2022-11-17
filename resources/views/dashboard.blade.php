@extends('frontend.main_master')
@section('frontend-content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
 <img  src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path) :url('upload/no_image.jpg')}}" style="width:100px; height:100px;border-radius:50%;margin-left:30px; margin-bottom:10px;" class="card-img-top" alt="">

<ul class="list-group list-group-flush">
<a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
<a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
<a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
<a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
</ul>
</div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
<div class="card">
    <h4 class="text-center"><span class="text-danger">Hi.. </span><strong>{{Auth::user()->name}}</strong> welcome To Wisdom Tech Ecommerce</h4>
</div>
            </div>
        </div>{{--  End row --}}
    </div>
</div>




@endsection
