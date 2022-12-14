@extends('admin.admin_master')

@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Administrator Password</h3>

            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Change Password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="POST" action="{{route('admin.update.password')}}" >
                    @csrf
                  <div class="row">
                    <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          <h5>Current Password <span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input id="current_password" type="password" name="oldpassword" class="form-control"  >
                            </div>
                      </div>

                      </div><!--col-md-6-->
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="password" type="password" name="password" class="form-control"  >
                              </div>
                        </div>

                        </div><!--col-md-6-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Password Confirmation<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"  >
                                  </div>
                            </div>

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
