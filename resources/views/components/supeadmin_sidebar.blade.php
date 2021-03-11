<div>
    
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box  text-center -->
            <div class="user-box" style="margin-left:21px">
                {{-- <img src="{{asset('assets')}}/admin/images/users/avatar.png" alt="user-img" title="Mat Helme"
                    class="rounded-circle avatar-md"> --}}
                <!--<div class="dropdown">-->
                    <!--<a href="javascript: void(0);" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"-->
                    <!--    data-toggle="dropdown">{{$user['username']}}</a>-->
                <!--    <div class="dropdown-menu user-pro-dropdown">-->
                        <!-- item-->
                <!--        <a href="javascript:void(0);" class="dropdown-item notify-item">-->
                <!--            <i class="fe-user mr-1"></i>-->
                <!--            <span>My Account</span>-->
                <!--        </a>-->
                        <!-- item-->
                <!--        <a href="{{url('logout')}}" class="dropdown-item notify-item">-->
                <!--            <i class="fe-log-out mr-1"></i>-->
                <!--            <span>Logout</span>-->
                <!--        </a>-->

                <!--    </div>-->
                <!--</div>-->
              
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    {{-- <li class="menu-title">Navigation</li> --}}
        
                    <li>
                        <a href="{{url('dashboard')}}" style="color:{{request()->is('dashboard')?'#FE5C5A':''}}"><i class="fab fa-dashcube"></i><span>Dashboard</span> </a>
                       
                    </li>
                    <li><a href="{{url('users')}}" style="color:{{request()->is('users')?'#FE5C5A':''}}"> <i class="fa fa-user" style="color: #3737aa;"></i> <span>Users</span> </a></li>
                    <li ><a href="{{url('manage-page')}}" style="color:{{request()->is('manage-page')?'#FE5C5A':''}}"> <i class="fa fa-file" ></i> <span>Manage page</span> </a></li>
                    <li><a href="{{url('pricing')}}" style="color:{{request()->is('pricing')?'#FE5C5A':''}}"> <i class="fas fa-dollar-sign" ></i> <span>Pricing</span> </a></li>
                     <li>
                        <a href="{{url('logo/create')}}" style="color:{{request()->is('logo/create')?'#FE5C5A':''}}"><i class="fas fa-image"></i><span>Logo</span> </a>
                         <a href="{{url('g-tag')}}" style="color:{{request()->is('g-tag')?'#FE5C5A':''}}"><i class="fas fa-tags"></i><span>G-tag</span> </a>
                       
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->
       
    </div>
    <!-- Left Sidebar End -->


</div>