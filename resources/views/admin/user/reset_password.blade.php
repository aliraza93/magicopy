@extends('layouts/adminlogin')
@section( 'content')
<style>

.error{
    color: red
}

</style>
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="{{url('/')}}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                                    </span>
                                </a>
            
                                <a href="{{url('/')}}" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                        </div>

                        <form action="" id="reset_Form" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="hidden" name="id" value="{{!empty($id)?$id:''}}">
                                    <input type="password" id="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="fa fa-eye font-12"></span>
                                        </div>
                                    </div>

                                </div>
                                <span id="password_error" style="color: red;"></span>

                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" style="background-color: #FE6161" id="submit" type="button">Update Password</button>
                                <h5 class="plz_wait" style="display:none">Please wait</h5>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Already have account?  <a href="{{url('login')}}" class="text-white ml-1"><b>Sign In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<script type="text/javascript">

    $(document).on('click','#submit',function(e){
        $url = "{{url('update_password')}}";
        $.ajax({
          url: $url,
          type: "POST",
          dataType: 'json',
          data: $('#reset_Form').serializeArray(),
          success: function (data) {
            if(data.response){
                var redirect = "{{url('/login')}}";
                window.location.replace(redirect);
            }
            else{
                    $('#password_error').html(data.password_error);
                }
          }
        });
    });
    
    </script>
@endsection