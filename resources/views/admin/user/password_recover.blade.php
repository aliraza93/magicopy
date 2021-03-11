@extends('layouts/adminlogin')
@section('content')

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
                                        <img src="{{asset('assets')}}/admin/images/logo.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                        </div>

                        <form action="" id="recoverForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">
                                <span id="emailerror" style="color: red;"></span>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" id="submit"  type="button"> Reset Password </button>
                                <h5 class="plz_wait" style="display:none">Please wait</h5>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Back to <a href="{{url('login')}}" class="text-white ml-1"><b>Log in</b></a></p>
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
       $("#submit").hide();
       $('.plz_wait').fadeIn();
       $url = "{{url('password-recover')}}";
       $.ajax({
         url: $url,
         type: "POST",
         dataType: 'json',
         data: $('#recoverForm').serializeArray(),
         success: function (data) {
            $("#submit").show();
            $('.plz_wait').hide();
        //    $('input[name="csrf_aeonbeds_token"]').val(data.csrf_token);
           if(data.response){
             $('#emailerror').html(data.msg);
           }
           else{
             if(data.msg !=''){
                   $('#emailerror').html(data.msg)
               }
               if(data.email_error !='')
                   $('#emailerror').html(data.email_error)
               
           }
         }
       });
    });
    
</script>

@endsection