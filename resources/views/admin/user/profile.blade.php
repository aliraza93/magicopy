@extends('layouts/mainAdmin')
@section('content')
<style>
    .fkyVgZ {
    background-color: #FE6161;
    padding: 10px 40px;
    border: medium none;
    border-radius: 34px;
    box-shadow: rgba(83, 92, 165, 0.2) 0px 1px 2px 2px;
    color: white;
    font-size: 20px;
    margin-top: 30px;
}
</style>
    <!-- Form row -->
    <div class="row" style="margin-top: 3%;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Profile</h4>
                    

                    <form action="{{url('update/profile')}}" method="POST">
                        @csrf
                        <p class="text-muted font-20">
                            Personal Information
                        </p>
                        @if(session('personalinfo'))
                         <div class="alert alert-success">{{session('personalinfo')}}</div>
                        @endif
                        <div class="form-row">
                            
                            
                            <div class="form-group col-md-6">
                                <label for="firstname" class="col-form-label">First Name*</label>
                                <input type="text" class="form-control" id="firstname" name="fname" value="{{(!empty($profile['fname']) ? $profile['fname'] : '')}}" placeholder="First Name*" >
                                @error('fname')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname" class="col-form-label">Last Name*</label>
                                <input type="text" class="form-control" id="lastname" name="lname" value="{{(!empty($profile['lname']) ? $profile['lname'] : '')}}"  placeholder="Last Name*" >
                                @error('lname')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label for="inputEmail4" class="col-form-label">User Name</label>-->
                            <!--    <input type="text" class="form-control" id="inputEmail4" name="username" value="{{(!empty($profile['username']) ? $profile['username'] : '')}}" placeholder="User Name">-->
                            <!--    @error('username')-->
                            <!--      <span class="error">{{$message}}</span>-->
                            <!--    @enderror-->
                            <!--</div>-->
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" value="{{(!empty($profile['email']) ? $profile['email'] : '')}}" placeholder="Email">
                                @error('email')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>      
                        </div>


                        <input type="submit" class="fkyVgZ" value="Update Profile" />

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

     <!-- Form row -->
     <div class="row" style="margin-top: 3%;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    

                    <form action="{{url('update/company_info')}}" method="POST">
                        <p class="text-muted font-20">
                            Company Information
                        </p>
                        @if(session('companyinfo'))
                         <div class="alert alert-success">{{session('companyinfo')}}</div>
                        @endif
                        <div class="form-row">
                            
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="company" class="col-form-label">Company*</label>
                                <input type="text" class="form-control" id="company" name="cmp_name" value="{{(!empty($profile['cmp_name']) ? $profile['cmp_name'] : '')}}" placeholder="Company*">
                                @error('cmp_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description" class="col-form-label">Description*</label>
                                <textarea class="form-control" id="description"  name="cmp_description" placeholder="Description" rows="5">{{(!empty($profile['cmp_description']) ? $profile['cmp_description'] : '')}}</textarea>
                                @error('cmp_description')
                                 <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>    
                        </div>


                        <input type="submit" class="fkyVgZ" value="Update" />

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection