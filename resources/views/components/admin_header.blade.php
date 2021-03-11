<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<style>
 @media screen and (min-width: 200px) {
  .topnav-menu >.topbar-dropdown {
    display: block;
}
}

/* 6 march 2021 */
body, #sidebar-menu>ul>li>a, .btn-pref{font-family: 'Lato', sans-serif!important;}
.templatediv,
.templatediv .h1, .templatediv .h2, .templatediv .h3, .templatediv .h4, .templatediv .h5, .templatediv .h6, .templatediv h1, .templatediv h2, .templatediv h3, .templatediv h4, .templatediv h5, .templatediv h6
{font-family: 'Roboto', sans-serif;}
.left-side-menu {
    top: 0;
}


*{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .grid-box {
            padding: 40px 0;
        }
        .grid-box-item{
            background-color: #fff;
        }
        .grid-box-item {
            background-color: #fff;
            padding: 19px;
            border-radius: 7px;
        }
        .grid-box-item p {
            color: #727272;
            margin-bottom: 8px;
            font-size: 15px;
        }
        .grid-box-item h5 {
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            color: #575757;
        }
        .page-options p {
            margin: 0;
            color: #868686;
            font-size: 15px;
        }
        .page-options {
            display: flex;
            justify-content: space-between;
        }
        .grid-btn {
            font-weight: 600;
            text-decoration: none;
            padding: 8px 17px;
            background-color: #fff;
            border: 1px solid;
            margin-left: 12px;
            color: #5f5f5f;
            border-radius: 8px;
        }
        .grid-btn.disabled {
            opacity: 0.5;
            pointer-events: none;
        }
        .content-card {
        	padding: 10px;
        }
        .btn-pref button {
            display: flex;
            align-items: center;
        }
        .btn-pref button i {
            margin-right: 6px;
        }
        .btn-pref {
            position: fixed;
            top: 0;
            z-index: 1001;
            left: 350px;
            transition: all ease 0.5s;
        }
        body[data-sidebar-size=condensed] .content-page .btn-pref {
            left: 185px;
        }
        .proj-dropdown>button, .btn-pref button {
            height: 70px;
        }
        .btn-pref button {
            padding: 6px 10px;
            border: none!important;
            border-bottom: 1px solid transparent!important;
        }
        .btn-pref button:hover {
            border: none!important;
            border-bottom: 1px solid #adadad!important;
        }
        .btn-pref button.active {
            background-color: transparent!important;
           
            color: #fe5c5a!important;
            border-bottom: 1px solid #fe5c5a!important;
        }
        .btn-pref button:focus {
            box-shadow: none!important;
        }
        body[data-sidebar-size=condensed] .content-page {
            margin-left: 0!important;
        }



.navbar-custom.opend {
    width: calc(100% - 240px);
}
.navbar-custom {
    left: auto;
    width: 100%;
}
.logo-box{
    visibility: hidden;
    padding-right: 60px;
}
.left-side-menu.opend .logo-box{
   visibility: visible;
}
body[data-sidebar-size=condensed] .left-side-menu {

    overflow: hidden;
    z-index: 1002;
    transform: translateX(-100%);
}
.left-side-menu .button-menu-mobile {
    position: absolute;
    top: 17px;
    right: 19px;
    border: none;
    background: none;
    font-size: 25px;
    z-index: 10;
}
.navbar-custom .button-menu-mobile {
    display: inline-block;
}
.navbar-custom.opend .button-menu-mobile {
    display: none;
}
.left-side-menu, .navbar-custom{transition: all ease 0.5s;}
.left-side-menu {
    background-color: #151b26;
    border-radius: 0!important;
    color: #cbd4db;
}
.nav-second-level li a, #sidebar-menu>ul>li>a{color: #cbd4db;}
.grid-box-item {
    height: 100%;
}
.grid-box-item h5, .grid-box-item p{
    word-break: break-all;
}
.other-menu svg {
    width: 20px;
}
.menu-item {
    display: flex;
    justify-content: space-between;
    color: #6f7782;
    padding: 15px 10px;
    border-bottom: 1px solid #6f7782;
}
.other-menu a:hover{color:#fff;}
.other-menu .menu-item svg {
    width: 13px;
}
div#sidebar-menu {
    border-bottom: 1px solid #6f7782;
}
.box-menu {
    padding: 4px 10px;
}
.dep {
    display: flex;
    justify-content: space-between;
    color: #e8ecee;
    width: calc(100% + 20px);
    margin-left: -10px;
    padding: 7px 10px;
    margin-bottom: 4px;
}
a.dep:hover {
    background-color: #ffffff14;
}
.other-menu .dep svg{
    fill: #ffffff80;
    width: 12px
}
.box-wrap {
    font-size: 14px;
    font-weight: 400;
    line-height: 22px;
    background-color: #273240;
    border-radius: 4px;
    color: #fff;
    padding: 8px;
}
.box-wrap h5 {
    color: #fff;
}
.box-wrap a {
    color: #14aaf5;
}
.box-wrap p {
    margin: 0;
    color: #9ca6af;
}
.other-menu .box-wrap svg{
    width: 16px;
    fill: #9ca6af;
}
.box-menu-item ul {
    list-style: none;
    display: flex;
    align-items: center;
    padding: 8px 0;
    margin-bottom: 0;
}
.box-menu-item li {
}
.box-menu-item ul a {
    width: 24px;
    height: 24px;
    display: grid;
    place-items: center;
    background-color: #ffffff1a;
    border-radius: 50%;
    margin: 0 3px;
    color: #fff;
}
.box-menu-item ul .active a {
    background-color: #0064fb;
}
.box-menu-item ul li:nth-last-child(1){
    margin-left: auto
}
.box-menu-item ul li:nth-last-child(1) a {
    display: block;
    width: auto;
    background: none;
    border-radius: 0;
}
.box-menu-item ul a svg{
    fill: #fff;
    width: 12px;
}
.green-check-box {
    width: calc(100% + 20px);
    margin-left: -10px;
    padding: 7px 10px;
    background: #ffffff29;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
}
.green-check-box:before{
    content: "";
    width: 12px;
    height: 12px;
    display: block;
    background-color: #48dafd;
    border-radius: 6px;
    margin-right: 7px;
}
.other-menu .green-check-box svg{
    width: 12px;
    fill: #ffffff80;
    margin-left: auto;
}
.bottem-item {
    /* position: absolute; */
    bottom: 0;
    border-top: 1px solid #6f7782;
    width: 100%;
    padding: 16px 14px;
    /* margin-top: 50px; */
}
.bottem-item a {
    color: #fff;
}
a.nav-link.dropdown-toggle.nav-user.mr-0.waves-effect.waves-light {
    width: 33px;
    height: 33px;
    padding: 0!important;
    background-color: #fad1f0;
    display: grid;
    place-items: center;
    margin-top: 19px;
    border-radius: 50%;
    position: relative;
    overflow: visible
}
a.nav-link.dropdown-toggle.nav-user.mr-0.waves-effect.waves-light:before {
    content: "";
    position: absolute;
    width: calc(100% + 8px);
    height: calc(100% + 8px);
    border: 2px solid #fb8231;
    left: -4px;
    top: -4px;
    border-radius: 50%;
}
span.pro-user-name.ml-1 {
    display: block;
    width: auto;
    line-height: 20px;
    margin: 0!important;
    color: #8a0f6b!important;
}
.dropdown-menu.dropdown-menu-right.profile-dropdown {
    min-width: 240px;
    border-radius: 10px;
}
.content-tabing {
    width: calc(100% + 56px);
    margin-left: -28px;
    padding: 0 30px;
}

.project-wrap h5 {
    color: #000;
    font-size: 14px;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0;
    opacity: 0.5;
}
.project-wrap h5 span, .project-wrap h5 a {
    font-size: 10px;
    width: 24px;
    height: 24px;
    display: inline-grid;
    place-items: center;
    border: 1px solid;
    border-radius: 7px;
    margin-right: 7px;
    color: #000;
}
.project-wrap h5 span:hover, .project-wrap h5 a:hover{opacity: 1;}
.project-wrap li {
    display: flex;
    align-items: center;
    cursor: pointer;
}
.project-wrap>ul>li{
    padding: 2px 10px;
}
.project-wrap .active {
    background-color: #fb8231;
}
.project-avatar {
    width: 25px;
    height: 25px;
    display: grid;
    place-items: center;
    background-color: #7d94ba;
    color: #000!important;
    border-radius: 50%;
    margin-right: 8px;
}
.project-item-name {
    margin-right: auto;
}
.project-wrap .dropdown-menu {
    left: auto!important;
    right: 0;
    min-width: max-content;
}
.project-wrap .dropdown button {
    border: none;
    color: #00000066;
    width: 26px;
    height: 26px;
    background-color: #00000017;
    border-radius: 50%;
    font-size: 13px;
    opacity: 0;
}
.project-wrap .dropdown:hover .dropdown-menu{display:block;}
.project-wrap li:hover .dropdown button{
    opacity: 1;
} 
.project-wrap .dropdown li a {
    color: #727272;
    display: block;
}
.project-wrap .dropdown li a:hover {
    background-color: #f0f0f0;
}
.project-wrap .dropdown li a {
    color: #727272;
    display: block;
    padding: 2px 10px;
    width: 100%;
    border-radius: 5px;
}
.popup-options a {
    padding: 5px 7px;
    margin-left: 10px;
    border: 1px solid transparent;
    color: #a7a7a7;
    border-radius: 5px;
    transition: all ease 0.5s;
}
.popup-options a:hover {
    background-color: #fff4f4;
    color: #f35d5d;
    border-color: #f35d5d;
    box-shadow: 0 0 8px #f35d5d17;
}
.popup-options a:focus, .popup-options a.active, .popup-options a:active {
    color: #fb8231;
    border-color: #fb8231;
    box-shadow: 0 0 8px #f35d5d17;
    outline: none;
}
a.show-input {
    display: block;
    max-width: max-content;
    margin-left: auto;
}
.account-pages textarea {
    width: 100%;
    border: none;
}
.account-pages textarea:focus {
    outline: none;
}
.profile-mail a {
    display: flex;
    align-items: center;
}
.circle-box {
    width: 36px;
    height: 36px;
    display: grid;
    place-items: center;
    background-color: #d1d7fa;
    border-radius: 50%;
    margin-right: 11px;
}
.side-profile-name h5, .side-profile-name p {
    margin: 0;
}
.side-profile-name p {
    font-size: 14px;
    color: #707070;
}
.profile-mail {
    padding: 10px;
    padding-bottom: 0;
}
/* body[data-sidebar-size=condensed] .content-page {
    margin-left: 0 !important;
} */
.other-menu {
    height: calc(100% - 330px);
    min-height: 300px;
    overflow: auto;
}
.project-wrap ul {
    padding: 0;
    margin: 0;
}
.simplebar-content {
    height: 100%;
}
.add-team {
    padding: 15px 0;
}
.banner-wrapper {
    border-radius: 10px;
    overflow: hidden;
    margin-top: 20px;
}

.cards-body .cmuvkJ {
    width: 100%;
    margin: 0;
    margin-bottom: 20px;
}
.cards-body .cmuvkJ {
    width: 100%;
    height: calc(100% - 20px);
    margin: 0;
    margin-bottom: 20px;
    padding: 15px;
}
.cards-body a {
    display: block;
    height: 100%;
}
.sc-iWFSnp {
    border: 2px solid transparent;
}
.sc-dRPiIx img {
    max-width: 42px;
}
body[data-sidebar-size=condensed]:not([data-layout=compact]) {
    min-height: auto!important;
}
span.time {
    margin-right: auto;
}
.bottem-item {
    /* position: sticky; */
    bottom: 0;
    border-top: 1px solid #6f7782;
    width: 240px;
    padding: 16px 14px;
    background-color: #151b26;
}
.left-side-menu{padding-bottom: 0;}
.proj-dropdown .dropdown-menu{z-index: 1020;}
.proj-dropdown {
    position: fixed;
    z-index: 1010;
    top: 0;
    
    transition: all ease 0.5s;
}
body[data-sidebar-size=condensed] .proj-dropdown {left: 96px;}
body[data-sidebar-size=default] .proj-dropdown {
    left: 260px;
}
.proj-dropdown>button>i {
    font-size: 12px;
    margin-left: 5px;
}
.help-getting-started {
    align-items: center;
    padding: 0 14px;
    margin-bottom: 11px;
}
.help-getting-started .circle-box {
    width: 26px;
    height: 26px;
    background-color: #3c4a76;
    margin-right: 5px;
}
.header-logo img {
    width: 39px;
}

.header-logo {
    position: absolute;
    left: 50%;
    top: 16px;
}
.jFuWAH {
    height: 672px!important;
    overflow-y: scroll;
}
.my-text {
    word-break: break-all;
}
.response {
    border: 2px solid orange;
}
.text-options {
    display: flex;
    padding: 0 6px;
    padding-bottom: 7px;
}
.top-icons {
    color: #a5a5a5;
    cursor: pointer;
}
.delete-icon {
    margin-left: auto;
    cursor: pointer;
}
@media (max-width: 992px){
    .navbar-custom.opend{width: 100%;}
    .navbar-custom.opend .button-menu-mobile {
    display: inline-block;}
        .btn-pref {
        left: 70px;
    }
    .left-side-menu {
        display: none;
        z-index: 1010 !important;
    }
    .left-side-menu{
        display: block;
        transform: translateX(-100%);
    }
    .sidebar-enable .left-side-menu{
        transform: translateX(0);
    }
    .logo-box {
        visibility: visible;
        display:none!important;
        width: 200px!important;
    }
    .logo span.logo-sm img {
        width: 110px!important;
    }
    .btn-pref {
        left: 48px;
    }
    .btn-pref button {
        display: flex;
        flex-direction: column;
        padding: 0 5px;
        justify-content: center;
    }
    .content-tabing {
        padding: 0;
    }
    .btn-pref {
        position: static;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 0 35px 0 rgb(154 161 171 / 15%);
        padding: 0 25px;
    }
    .navbar-custom {
    box-shadow: none;
    }
    
    .btn-pref button {
        height: auto;
    }
    .btn-pref button {
        padding: 0 16px;
        padding-bottom: 8px;
    }
    body[data-sidebar-size=default] .proj-dropdown {
        left: 55px;
    }
    .jFuWAH {
        width: 100%!important;
        height:auto!important;
    }
}
@media (max-width: 767px){
    .grid-box {
        padding: 0!important;
    }
    .content-page, body[data-sidebar-size=condensed] .content-page {
        padding: 0!important;
    }
    .content-card {
        padding: 10px 0;
    }
    .page-title-box .page-title {
        line-height: 20px;
        margin-bottom: 8px;
    }
}
/* 6 march 2021 end */
</style>
<!-- Topbar Start -->
{{-- project dorpdown --}}
{{-- <div class="proj-dropdown sidemenu-opend dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Projects
    <i class="fas fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <div class="project-wrap">
            <h5>New Project <a href="#" data-toggle="modal" data-target="#createProject"><i class="fas fa-plus"></i></a></h5>
            
            <ul>
                  <li>
                    <span class="project-avatar">P</span> 
                    <span class="project-item-name">Personal</span>
                    <div class="dropdown">
                      <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#" data-toggle="modal" data-target="#createProject"><i class="fas fa-edit"></i> Rename</a></li>
                        <li><a href="#"><i class="fas fa-trash-alt"></i> Delete</a></li>
                      </ul>
                    </div>
                  </li>
            </ul>
          </div>
    </ul>
</div> --}}
{{-- project dorpdown end --}}
<div class="navbar-custom opend" style="background-color: white;">
    <div class="container-fluid">
        <div class="header-logo">
            <img src="{{asset('assets/admin/images/template/icon.png')}}" alt="Logo">
        </div>
        <ul class="list-unstyled topnav-menu float-right mb-0">
            
            {{-- <li>
                <select class="form-control" id="project">
                    <option disabled="">Select Project</option>
                    @foreach($currentUser->projects as $project)
                    <option value="{{ $project->id }}" {{ ($project->id == $currentUser->current_project) ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </li> --}}
            {{-- <li class="dropdown d-none d-lg-inline-block" >
                <a style="color: #fe5c5a;" class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fa fa-window-maximize noti-icon"></i>
                </a>
            </li> --}}
            

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    {{-- <img src="../assets/images/users/user-6.jpg" alt="user-image" class="rounded-circle"> --}}
                    <span class="pro-user-name ml-1" style="color: #fe5c5a; text-transform: uppercase;">
                        {{-- {{$user['username']}} <i class="fa fa-chevron-down"></i>  --}}
                        NI
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    {{-- <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome To Magicopy!</h6>
                    </div> --}}
                    <div class="profile-mail">
                        <a href="#">
                            <div class="circle-box">NB</div>
                            <div class="side-profile-name">
                                <h5>NITISH BHARTI</h5>
                                <p> nbnitishbharti2@gmail.com </p>
                            </div>
                        </a>
                    </div>
                    
                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a href="{{url('/')}}" class="dropdown-item notify-item">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>

                    @if($user['role']=='user')
                    <div class="dropdown-divider"></div>
                    <a href="{{url('profile')}}" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                    
		    <div class="dropdown-divider"></div>	
                    <a href="members" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>Add Members</span>
                    </a>
                    @endif
                    <!-- item-->
                    <div class="dropdown-divider"></div>
                    <a href="{{url('update-password')}}" class="dropdown-item notify-item">
                        <i class="fa fa-key"></i>
                        <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{url('logout')}}" class="dropdown-item notify-item">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

                        {{-- <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fas fa-cog noti-icon"></i>
                            </a>
                        </li> --}}

                    </ul>

                    <!-- LOGO -->
                    {{-- <div class="logo-box" style="margin-right: 2%;">
                        <a href="{{url('/')}}" class="logo logo-dark text-center">
                            <span class="logo-sm" >
                                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" style="width: 128px;height: 26px;">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="{{url('/')}}" class="logo logo-light text-center">
                            <span class="logo-sm ml-2">
                                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" style="width: 80px;">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets')}}/frontend/img/logo.png" alt="" style="width: 128px;height: 26px;">
                            </span>
                        </a>
                    </div> --}}

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fa fa-bars" style="color: #fe5c5a;"></i>
                            </button>
                        </li>
                        
                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->
            <!-- Modal -->
            <div class="modal fade" id="createProject" tabindex="-1" role="dialog" aria-labelledby="loginModel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="menu" data-toggle="modal" data-target="#createProject" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="account-pages mt-1 mb-1">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="card bg-pattern" style="width: 100%;">
                                        <div class="card-body p-0">
                                            <div class="form-group mb-0">
                                                <label for="emailaddress">Project Name</label>
                                                <input type="hidden" name="project_id" id="project_id"> 
                                                <input class="form-control" type="text" id="name" name="name"  placeholder="Enter your Project Name">
                                                <span class="error" id="email_error"></span>
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end container -->
                        </div>
                        <!-- end page -->
                    </div>
                    <div class="modal-footer pt-0">
                        <button class="btn btn-danger" id="create-project">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
</div>

<script type="text/javascript">
var status_delete = false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function rename_project(el){
        var project_id = $(el).attr("data-id");
        var project_name = $(el).attr("data-name");
        $("#project_id").val(project_id);
        $("#name").val(project_name);
        $(".modal-title").text('Update Project');
    }
    function change_project(el){
        var current_path = window.location.pathname;
        var project_id = $(el).attr("data-id");
        $.ajax({
            url: "{{ url('update-user-project') }}/"+project_id,
            method:"get",
            cache: false,
            success: function(result){
                location.reload();
            },error:function(error) {
                location.reload();
            }
        });
    }
    function delete_project(el){
        var project_id = $(el).attr("data-id");
        $.ajax({
            url: "{{ url('delete-project') }}/"+project_id,
            method:"get",
            cache: false,
            success: function(result){
                if(result.status == true) {
                    location.reload();
                }
            }
        });
    }
    $("#create-project").click(function() {
        var name = $("#name").val();
        var id = $("#project_id").val();
        if (name!= '') {
            $.ajax({
                url: "{{ url('create-project') }}",
                method:"post",
                data: {name:name, id:id, _token: "{{ csrf_token()}}"},
                cache: false,
                success: function(result){
                    if(result.status == true) {
                        location.reload();
                    }
                }
            });
        }
    });
    $( document ).ready(function() {
        $('.button-menu-mobile').click(function(){
        $('.navbar-custom').toggleClass('opend');
        $('.left-side-menu').toggleClass('opend');
        
    });
    setTimeout(() => {
        var opendState = $('body').hasClass('sidebar-enable');
            if(opendState){
                $('.proj-dropdown').addClass('sidemenu-opend');
            }else{
                $('.proj-dropdown').removeClass('sidemenu-opend');
            }
        }, 10);

    $(document, '.sidebar-menu', '.button-menu-mobile', 'body').click(function(){
        setTimeout(() => {
        var opendState = $('body').hasClass('sidebar-enable');
            if(opendState){
                $('.proj-dropdown').addClass('sidemenu-opend');
            }else{
                $('.proj-dropdown').removeClass('sidemenu-opend');
            }
        }, 10);
    });
    $('.copy-icon').each(function() {
        $(this).click(function() {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(this).parent().parent().children('.my-text').text()).select();
            document.execCommand("copy");
            $temp.remove();
        });
    });
    $('.delete-icon').each(function() {
        $(this).click(function() {
            var response_id = $(this).attr('data-id');
            $.ajax({
                url: "{{ url('delete-response') }}/"+response_id,
                method:"get",
                cache: false,
                success: function(result){
                    if(result.status == true) {
                        deleteAjaxCallBack(response_id);
                    }
                }
            });
        });
    });
});
function deleteAjaxCallBack(response_id){
    $('.response-content-'+response_id).remove();
}
</script>