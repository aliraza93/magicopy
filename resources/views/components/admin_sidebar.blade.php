
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu opend">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                {{-- logo --}}
                {{-- <div class="logo-box">
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

                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fa fa-bars" style="color: #fe5c5a;"></i>
                </button>
                {{-- logo end --}}


                <ul id="side-menu">

                  @if(empty($user['subscriber']))
                    <li style=""><a href="javascript:void(0)"> <span style="font-size:17px;border-radius: 44px;" class="text-center btn btn-danger"><span style="font-size:20px" class="trail-quantity">{{$adscounter}}</span> <span >&nbsp;credits left</span></span></a></li>
                    @endif
        
                    <li>
                        <a href="{{url('template')}}" style="display: flex;">
                            <i class="fab fa-dashcube"></i>
                            <span>Dashboard</span> 
                        </a>
                    </li>
                   
                    <li>
                        <a href="#sidebarBaseui" data-toggle="collapse">
                            <i data-feather="pocket"></i>
                            <span> Generate</span>
                            <!--<span class="menu-arrow"></span>-->
                        </a>
                        <div class="collapse" id="sidebarBaseui">
                            <ul class="nav-second-level">
                                <li><a href="javascript:void(0)" onclick="pageload('facebook-ads')"> <i class="fab fa-facebook" style="color: #3737aa;"></i> <span>Facebook Ad</span> </a></li>
                                <li><a href="javascript:void(0)" onclick="pageload('facebook-headline')"> <i class="fab fa-facebook" style="color: #3737aa;"></i> <span>Facebook Headline</span> </a></li>
                                <li><a href="javascript:void(0)" onclick="pageload('google-ads')"><i class="fab fa-google" style="color: #ff8227;"></i><span> Google Ad</span> </a></li>
                                <li><a href="javascript:void(0)"  onclick="pageload('product-ads')"><i class="fab fa-product-hunt" style="color: #ff8227;"></i><span> Product Description</span> </a></li>
                                <li><a href="javascript:void(0)"  onclick="pageload('copy-paste')"><i class="fas fa-copy" style="color: #fe5c5a;"></i><span> Content Improver</span> </a></li>
                            </ul>
                        </div>
                        <a href="{{ url('content') }}" >
                            {{-- <i data-feather="pocket"></i> --}}
                            <i class="fas fa-layer-group"></i>
                            <span>Content</span>
                            <!--<span class="menu-arrow"></span>-->
                        </a>
                    </li>
                    <li>
                        <a href="#sidebarTables" data-toggle="collapse">
                            <i data-feather="settings"></i>
                            <span> Tools</span>
                            <!--<span class="menu-arrow"></span>-->
                        </a>
                        <div class="collapse" id="sidebarTables">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{url('template')}}" >
                                       <i class="fa fa-th" aria-hidden="true"></i>
                                        <span> Browse </span>
                                      
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    </ul>

            </div>
            <!-- End Sidebar -->

            {{-- other menu --}}
            <div class="other-menu" data-simplebar>
                {{-- <a href="#" class="menu-item"><span>Projects</span>
                    <svg class="MiniIcon SidebarCollapsibleHeader-toggle ArrowDownMiniIcon" fill="#6f7782" focusable="false" viewBox="0 0 24 24"><path d="M3.5,8.9c0-0.4,0.1-0.7,0.4-1C4.5,7.3,5.4,7.2,6,7.8l5.8,5.2l6.1-5.2C18.5,7.3,19.5,7.3,20,8c0.6,0.6,0.5,1.5-0.1,2.1 l-7.1,6.1c-0.6,0.5-1.4,0.5-2,0L4,10.1C3.6,9.8,3.5,9.4,3.5,8.9z"></path></svg>
                </a> --}}
                {{-- <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a> --}}
                

                <a href="#" class="menu-item"><span>Reports</span>
                <svg class="MiniIcon SidebarCollapsibleHeader-toggle ArrowDownMiniIcon" fill="#6f7782" focusable="false" viewBox="0 0 24 24"><path d="M3.5,8.9c0-0.4,0.1-0.7,0.4-1C4.5,7.3,5.4,7.2,6,7.8l5.8,5.2l6.1-5.2C18.5,7.3,19.5,7.3,20,8c0.6,0.6,0.5,1.5-0.1,2.1 l-7.1,6.1c-0.6,0.5-1.4,0.5-2,0L4,10.1C3.6,9.8,3.5,9.4,3.5,8.9z"></path></svg>
                </a>
                {{-- <div class="box-menu" class="menu-item">
                    <a href="#" class="dep">
                    <span>IT</span>
                    <svg class="MiniIcon SidebarTeamDetailsAddMenuButton-addButtonIcon PlusMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M10,10V4c0-1.1,0.9-2,2-2s2,0.9,2,2v6h6c1.1,0,2,0.9,2,2s-0.9,2-2,2h-6v6c0,1.1-0.9,2-2,2s-2-0.9-2-2v-6H4c-1.1,0-2-0.9-2-2s0.9-2,2-2H10z"></path></svg>    
                    </a>
                    <div class="box-menu-item">
                        <div class="box-wrap">
                            <h5>IT is currently in trial. <a href="#">Learn more</a></h5>
                            <p>
                                <svg class="Icon TrialNotification-timerIcon TimerIcon" focusable="false" viewBox="0 0 32 32"><path d="M26.6,8.8l2.3-2.3c0.4-0.4,0.4-1,0-1.4l0,0c-0.4-0.4-1-0.4-1.4,0l-2.3,2.3C22.7,5.3,19.5,4,16,4S9.3,5.3,6.8,7.4L4.6,5.2c-0.4-0.4-1-0.4-1.4,0l0,0c-0.4,0.4-0.4,1,0,1.4l2.3,2.3c-2.6,3-3.9,7-3.3,11.4c1,6.1,6,11,12.2,11.7C22.8,32.9,30,26.3,30,18C30,14.5,28.7,11.3,26.6,8.8z M16,30C9.4,30,4,24.6,4,18S9.4,6,16,6s12,5.4,12,12S22.6,30,16,30z M13,0h6c0.6,0,1,0.4,1,1l0,0c0,0.6-0.4,1-1,1h-6c-0.6,0-1-0.4-1-1l0,0C12,0.4,12.4,0,13,0z M16,17l5.2-5.2c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4l-5.2,5.2c-0.4,0.4-1,0.4-1.4,0l0,0C15.6,18,15.6,17.3,16,17z M16,8c0.6,0,1,0.4,1,1s-0.4,1-1,1c-0.6,0-1-0.4-1-1S15.4,8,16,8z M16,26c0.6,0,1,0.4,1,1s-0.4,1-1,1c-0.6,0-1-0.4-1-1S15.4,26,16,26z M9.6,10.6c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S9,10.6,9.6,10.6z M22.4,23.4c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S21.8,23.4,22.4,23.4z M7,17c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S6.4,17,7,17z M25,17c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S24.4,17,25,17z M9.6,23.4c0.6,0,1,0.4,1,1s-0.4,1-1,1s-1-0.4-1-1S9,23.4,9.6,23.4z"></path></svg>
                                30 days remaining
                            </p>

                        </div>

                        <ul>
                            <li class="active"><a href="#">NI</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#">
                                <svg class="MiniIcon AbstractThemeableRectangularButton-leftIcon PlusMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M10,10V4c0-1.1,0.9-2,2-2s2,0.9,2,2v6h6c1.1,0,2,0.9,2,2s-0.9,2-2,2h-6v6c0,1.1-0.9,2-2,2s-2-0.9-2-2v-6H4c-1.1,0-2-0.9-2-2s0.9-2,2-2H10z"></path></svg>
                                Invite people    
                            </a></li>
                        </ul>

                        <div class="green-check-box">
                            Content Writing

                            <svg class="MiniIcon MoreMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M5,12c0,1.4-1.1,2.5-2.5,2.5S0,13.4,0,12s1.1-2.5,2.5-2.5S5,10.6,5,12z M12,9.5c-1.4,0-2.5,1.1-2.5,2.5s1.1,2.5,2.5,2.5s2.5-1.1,2.5-2.5S13.4,9.5,12,9.5z M21.5,9.5c-1.4,0-2.5,1.1-2.5,2.5s1.1,2.5,2.5,2.5S24,13.4,24,12S22.9,9.5,21.5,9.5z"></path></svg>
                        </div>
                    </div>
                </div> --}}

                <a class="menu-item" href="#projects" data-toggle="collapse"  aria-expanded="true"><span>Teams</span>
                    <svg class="MiniIcon SidebarCollapsibleHeader-toggle ArrowDownMiniIcon" fill="#6f7782" focusable="false" viewBox="0 0 24 24"><path d="M3.5,8.9c0-0.4,0.1-0.7,0.4-1C4.5,7.3,5.4,7.2,6,7.8l5.8,5.2l6.1-5.2C18.5,7.3,19.5,7.3,20,8c0.6,0.6,0.5,1.5-0.1,2.1 l-7.1,6.1c-0.6,0.5-1.4,0.5-2,0L4,10.1C3.6,9.8,3.5,9.4,3.5,8.9z"></path></svg>
                </a>
                  <div class="collapse show" id="projects">
                    
                    <div class="box-menu" class="menu-item">
                        <a href="#" class="dep">
                        <span>Marketing</span>
                        <svg class="MiniIcon SidebarTeamDetailsAddMenuButton-addButtonIcon PlusMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M10,10V4c0-1.1,0.9-2,2-2s2,0.9,2,2v6h6c1.1,0,2,0.9,2,2s-0.9,2-2,2h-6v6c0,1.1-0.9,2-2,2s-2-0.9-2-2v-6H4c-1.1,0-2-0.9-2-2s0.9-2,2-2H10z"></path></svg>    
                        </a>
                        <div class="box-menu-item">
    
                            <ul>
                                <li class="active"><a href="#">NI</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#">
                                    <svg class="MiniIcon AbstractThemeableRectangularButton-leftIcon PlusMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M10,10V4c0-1.1,0.9-2,2-2s2,0.9,2,2v6h6c1.1,0,2,0.9,2,2s-0.9,2-2,2h-6v6c0,1.1-0.9,2-2,2s-2-0.9-2-2v-6H4c-1.1,0-2-0.9-2-2s0.9-2,2-2H10z"></path></svg>
                                    Invite people    
                                </a></li>
                            </ul>
    
                            <div class="green-check-box">
                                Whats Going on
    
                                <svg class="MiniIcon MoreMiniIcon" focusable="false" viewBox="0 0 24 24"><path d="M5,12c0,1.4-1.1,2.5-2.5,2.5S0,13.4,0,12s1.1-2.5,2.5-2.5S5,10.6,5,12z M12,9.5c-1.4,0-2.5,1.1-2.5,2.5s1.1,2.5,2.5,2.5s2.5-1.1,2.5-2.5S13.4,9.5,12,9.5z M21.5,9.5c-1.4,0-2.5,1.1-2.5,2.5s1.1,2.5,2.5,2.5S24,13.4,24,12S22.9,9.5,21.5,9.5z"></path></svg>
                            </div>
                            <div class="add-team">
                                + Add Team
                            </div>
                        </div>
                    </div>

                  </div>

                <div class="bottem-item">
                    <a href="{{url('members')}}">
                        <img src="https://d3ki9tyy5l5ruj.cloudfront.net/obj/8a613bc1f8e95548a8ccf856b77261a748868a44/illustration_invite_teammates.svg" alt="">
                        &nbsp; Invite teammates
                    </a>
                </div>
                <div class="help-getting-started d-flex">
                    <div class="circle-box" style="color:#fff;">?</div>
                    <span>Help & Getting Started</span>
                </div>
            </div>
            {{-- other menu end --}}

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->
        <script type="text/javascript">

            function pageload(page){
                $url = "{{url('/template')}}";
                token = $('input[name="_token"]').val();
                window.history.pushState("template", "Title", "{{url('template')}}");
                $.ajax({
                  url: $url,
                  type: "POST",
                  dataType: 'json',
                  data: {_token: token,template:page},
                  success: function (data) {
                    if(data.response){
                        $('.list').find( 'li.active' ).removeClass( 'active' );
                        $('#'+data.pagename+'').addClass( 'active' );
                        $('.templatediv').html(data.page);
                    }
                    else{
                        alert('Something Went Wrong');
                    }
                  }
                });
            };
            // $('.collapse').collapse();
            // $('#collapseExample').collapse({
            //     toggle: false
            //     });
            </script>
    </div>
    <!-- Left Sidebar End -->

