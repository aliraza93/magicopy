@extends('layouts/adminlogin')
@section('content')
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
                            <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                        </div>
                        @if(session('changepassword'))
                        <div class="alert alert-danger">{{session('changepassword')}} </div>
                        @endif
                        @if(session('message'))
                        <div class="alert alert-{{session('message')=='You Are Not Allowed To Perform This Action!' ? 'danger' : 'success'}}">{{session('message')}}</div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        <form action="{{url('login')}}" enctype="multipart/form-data" method="POST" >
                             @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="email"  placeholder="Enter your email">
                                @error('email')
                                    <span class="error">{{$message}}</span>
                                @enderror
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
                                @error('password')
                                  <span class="error">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" style="background-color: #FE6161" type="submit"> Log In </button>
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

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="{{route('password-recover')}}" class="text-white-50 ml-1">Forgot your password?</a></p>
                        <p class="text-white-50">Don't have an account? <a href="{{url('register')}}" class="text-white ml-1"><b>Sign Up</b></a></p>
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

@endsection