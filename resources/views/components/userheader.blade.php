<div>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <style>
        .nav-button{
            display: none;
        }
         @media screen and (max-width: 2000px) and (min-width: 992px) {
            .nav > .nav-button {
                display: none;
            }
           
        }
        @media screen and (max-width: 992px) {
            .nav-button {
                display: block;
            }
            .attr-nav{
                display: none;
            }
        }
           a{
            cursor: pointer;
		
        }
        	
    .error{
        color: red
    }
    @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .card-body {
     flex: 1 1 auto;
     padding: 1.25rem
 }

 .template-demo p{
     color: black;
     font-size: 0.875rem;
     margin-bottom: .5rem;
     line-height: 1.5rem
 }

 .cust-name{
     line-height: .2 !important;
     color: black;
 }
 .cust-profession{
     color: white;
 }


 .profile {
     margin-top: 25px;
     margin-left: 11px
 }

 .profile-pic {
     width: 48px !important;
      margin-top: 9px;
      max-width: 70px;
 }

 .cust-name {
     font-size: 18px
 }

 .cust-profession {
     font-size: 10px
 }

 .items {
     width: 90%;
     margin: 0px auto;
     margin-top: 100px
 }

 .slick-slide {
     margin: 10px
 }
 .fa-star{
     color: #d4b419f0;
 }
 .thisconcount:before{
    height: 600px;
    content: "";
    width: 600px;
    position: absolute;
    background: linear-gradient(40deg, transparent, rgb(116 216 254 / 7%));
    left: -300px;
    top: 700px;
    transform: rotate( 
44deg
 );
    z-index: -1;
    border-radius: 0px;
 }

    </style>
    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-bg navbar-fixed dark no-background bootsnav" id="navbar">

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav light">
                    <ul>
                         @if($isLoggedIn==true)
                        @if($user['role']=='user')
                        <li class=" button">
                            <a href="{{route('template')}}">Dashboard</a>
                        </li>
                        @else
                         <li class=" button">
                            <a href="{{url('dashboard')}}">Dashboard</a>
                        </li>
                        @endif
                        @else
                        <li class="button" style="margin-right:4px">
                            <a  href="" data-toggle="modal" data-target="#login-form">Login</a>
                        </li>
                        <li class="button">
                            <a style="background: #FE6161; color: white;" href="{{url('register')}}" data-toggle="modal" data-target="#register-form">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('assets')}}/frontend/img/logo.png" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <a class="smooth-menu" href="#features">How it Works</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#overview">Features</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#team">Benefits</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#pricing">Pricing</a>
                        </li>
                        @if($isLoggedIn==true)
                        @if($user['role']=='user')
                        <li class="smooth-menu nav-button">
                            <a href="{{route('template')}}">Dashboard</a>
                        </li>
                        @else
                         <li class="smooth-menu nav-button">
                            <a href="{{url('dashboard')}}">Dashboard</a>
                        </li>
                        @endif
                        @else
                        <li class="smooth-menu nav-button" style="margin-right:4px">
                            <a href="{{route('login')}}" data-toggle="modal" data-target="#login-form">Login</a>
                        </li>
                        <li class="smooth-menu nav-button">
                            <a href="{{url('register')}}"  data-toggle="modal" data-target="#register-form">Register</a>
                        </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
    
<!-- Modal -->
<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="loginModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModel">
                    <div class="auth-logo">
                        <a href="{{url('/')}}" class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                            </span>
                        </a>

                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style>
                    .error {
                        color: red
                    }
                </style>
                <div class="account-pages mt-1 mb-1">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="card bg-pattern" style="width: 100%;">

                                <div class="card-body p-4">

                                    <!--<div class="text-center w-75 m-auto">-->
                                    <!--    <div class="auth-logo">-->
                                    <!--        <a href="{{url('/')}}" class="logo logo-dark text-center">-->
                                    <!--            <span class="logo-lg">-->
                                    <!--                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">-->
                                    <!--            </span>-->
                                    <!--        </a>-->

                                    <!--    </div>-->
                                    <!--<p class="text-muted mb-4 mt-3">Enter your email address and password to access Dashboard.</p>-->
                                    <!--</div>-->
                                    @if(session('changepassword'))
                                    <div class="alert alert-danger">{{session('changepassword')}} </div>
                                    @endif
                                    @if(session('message'))
                                    <div class="alert alert-{{session('message')=='You Are Not Allowed To Perform This Action!' ? 'danger' : 'success'}}">{{session('message')}}</div>
                                    @endif

                                    <div class="alert alert-danger" style="display:none" id="error"></div>
                                    <form action="{{url('login')}}" enctype="multipart/form-data" id="login_form" method="POST">

                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">

                                            <span class="error" id="email_error"></span>

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                                                <div class="input-group-append" data-password="false">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-eye font-12"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="error" id="password_error"></span>

                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" style="background-color: #FE6161" type="button" id="submit-button"> Log In </button>
                                            <h5 class="please_wait">Please Wait</h5>
                                        </div>
                                        @csrf
                                    </form>

                                    {{-- <div class="text-center">
                            <h5 class="mt-3 text-muted">Sign in with</h5>
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fab fa-facebook-square"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
                                </li>
                            </ul>
                        </div> --}}

                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card {{route('password-recover')}} -->


                            <div class="col-12 text-center">
                                <p> <a onclick="openmodel('forgotpassword-form','login-form')" class="text-black-50 ml-1">Forgot your password?</a></p>
                                <p class="text-black-50 ml-1">Don't have an account? <a onclick="openmodel('register-form','login-form')" class="text-black ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->

                            <!-- end row -->


                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>

                <!-- end page -->
            </div>
            <!--  <div class="modal-footer">
       
        <button type="button" class="button-credit-card">Pay £</button>
      </div> -->
        </div>
    </div>
</div>
 <!-- login model end   -->
 <!---  register model -->
 
 

 <div class="modal fade" id="register-form" tabindex="-1" role="dialog" aria-labelledby="registerModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModel">   
       <div class="auth-logo">
                                <a href="{{url('/')}}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                                    </span>
                                </a>
            
                            </div>
            </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <style>
    .error{
        color: red
    }
</style>
<div class="account-pages mt-1 mb-1">
    <div class="container">
        <div class="row justify-content-center">
         
                <div class="card bg-pattern" style="width: 100%;">

                    <div class="card-body p-4">
                        
                        <!--<div class="text-center w-75 m-auto">-->
                        <!--    <div class="auth-logo">-->
                        <!--        <a href="{{url('/')}}" class="logo logo-dark text-center">-->
                        <!--            <span class="logo-lg">-->
                        <!--                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">-->
                        <!--            </span>-->
                        <!--        </a>-->
            
                        <!--    </div>-->
                            <!--<p class="text-muted mb-4 mt-3">Enter your email address and password to access Dashboard.</p>-->
                        <!--</div>-->
                        @if(session('changepassword'))
                        <div class="alert alert-danger">{{session('changepassword')}} </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-{{session('message')=='You Are Not Allowed To Perform This Action!' ? 'danger' : 'success'}}">{{session('message')}}</div>
                        @endif
                        <div class="alert alert-success" id="msg"> </div>
                         <div class="alert alert-danger"  id="error_msg" style="display: none;"></div>
                        <div class="alert alert-danger" style="display:none" id="error"></div>
                    <form action="{{url('register')}}" method="POST" id="register_form" >
                            @csrf
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" type="text" name="username" id="fullname" value="{{old('username')}}" placeholder="Enter your name" >
                               
                                    <span class="error" id="username_error"> </span>
                               
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="ref" value="{{ Request::get('mbr') }}">
                                 <input type="hidden" name="pa" value="{{ Request::get('pa') }}">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" value="{{old('email')}}"  placeholder="Enter your email">
                                 <span class="error" id="emailaddress_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="fa fa-eye font-12"></span>
                                        </div>
                                    </div>
                                </div>
                                    <span class="error" id="register_password"> </span>

                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="fa fa-eye font-12"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>
                              <span class="error" id="checkbox_error"> </span>
                               
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" style="background-color: #FE6161" type="button" id="register-button"> Sign Up </button>
                            </div>

                        </form>

                        {{-- <div class="text-center">
                            <h5 class="mt-3 text-muted">Sign in with</h5>
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fab fa-facebook-square"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fab fa-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fab fa-github"></i></a>
                                </li>
                            </ul>
                        </div> --}}

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                    <div class="col-12 text-center">
                        <p class="text-black-50">Already have account?  <a onclick="openmodel('login-form','register-form')" class="text-black ml-1"><b>Sign In</b></a></p>
                    </div> <!-- end col -->
             
                <!-- end row -->
                <!-- end row -->

            
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
   
<!-- end page -->
      </div>
    <!--  <div class="modal-footer">
       
        <button type="button" class="button-credit-card">Pay £</button>
      </div> -->
    </div>
  </div>
</div>
 <!-- register model end -->
<!--  Forgot password Model start   -->
 
 <div class="modal fade" id="forgotpassword-form" tabindex="-1" role="dialog" aria-labelledby="forgotModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotModel">   
       <div class="auth-logo">
                                <a href="{{url('/')}}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                                    </span>
                                </a>
            
                            </div>
            </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="account-pages mt-1 mb-1">
    <div class="container">
        <div class="row justify-content-center">
         
                <div class="card bg-pattern" style="width: 100%;">

                    <div class="card-body p-4">
                     
                       <div class="text-center w-75 m-auto">
                            <!--<div class="auth-logo">-->
                            <!--    <a href="{{url('/')}}" class="logo logo-dark text-center">-->
                            <!--        <span class="logo-lg">-->
                            <!--            <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">-->
                            <!--        </span>-->
                            <!--    </a>-->
            
                            <!--    <a href="{{url('/')}}" class="logo logo-light text-center">-->
                            <!--        <span class="logo-lg">-->
                            <!--            <img src="{{asset('assets')}}/admin/images/logo.png" alt="" height="22">-->
                            <!--        </span>-->
                            <!--    </a>-->
                            <!--</div>-->
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
                                <button class="btn btn-primary btn-block" style="background-color: #FE6161" id="submit"  type="button"> Reset Password </button>
                                <h5 class="plz_wait" style="display:none">Please wait</h5>
                            </div>

                        </form>

                     
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                    <div class="col-12 text-center">
                         <p class="text-white-50">Back to <a onclick="openmodel('login-form','forgotpassword-form')" class="text-white ml-1"><b>Log in</b></a></p>
                      
                    </div> <!-- end col -->
             
                <!-- end row -->
                <!-- end row -->

            
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
   
<!-- end page -->
      </div>
    <!--  <div class="modal-footer">
       
        <button type="button" class="button-credit-card">Pay £</button>
      </div> -->
    </div>
  </div>
</div>

<!-- forgot password model end -->
<!-- Modal -->
 <script src="{{asset('assets')}}/admin/js/app.min.js"></script>
<script src="{{asset('assets')}}/custom/js/user.js"></script>
</div>