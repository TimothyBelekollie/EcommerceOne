@extends('admin.admin_master')

@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Administrator Profile</h3>

            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Profile</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <h5>Admin User Name <span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="text" name="name" class="form-control" value="{{$editData->name}}" >
                            </div>
                      </div>

                      </div><!--col-md-6-->

                      <div class="col-md-6">
                        <div class="form-group">
                            <h5>Admin Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="email" name="email" class="form-control" value="{{$editData->email}}">
                              </div>
                        </div>

                        </div><!--col-md-6-->
                      </div>

                 <div class="row">


                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Upload Profile Image <span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
                        </div>
                      </div><!--col-md-6-->

                      <div class="col-md-6">
                        <img id="showImage" src="{{(!empty($adminData->profile_photo_path))?url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" style="width:100px; height:100px;">
                      </div><!--col-md-6-->
                    </div>


                  </div>



                     <div class="text-xs-right">
                        {{-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> --}}
                        <input type="submit" class="btn btn-rounded btn-info" value="update">
                    </div>
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>



  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload=function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);

        });
    });

  </script>
@endsection
