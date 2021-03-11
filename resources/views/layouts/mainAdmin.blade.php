<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Magic Copy - Generating Great Content</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets')}}/frontend/img/favicon.png">

        <!-- Plugins css -->
        <link href="{{asset('assets/admin')}}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin')}}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="{{asset('assets/admin')}}/css/bootstrap-modern.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('assets/admin')}}/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{asset('assets/admin')}}/css/bootstrap-modern-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{asset('assets/admin')}}/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

        <!-- icons -->
        <link href="{{asset('assets/admin')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
        @if(Request::path() == "template" && $user['role'] !='isAdmin')
            {{-- <style type="text/css">
                .content-page {
                    margin-left: 0px !important;
                }
            </style> --}}
        @endif
        {{-- <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script> --}}
        <script src="{{asset('assets')}}/admin/js/jquery.min.js"></script>
        
    </head>

    <body class="loading" data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
     @csrf
        <!-- Begin page -->
        <div id="wrapper">

    <x-admin_header  :user="$user"  />
    @if($user['role']=='isAdmin')
        <x-supeadmin_sidebar  :user="$user"  />
    @else
        {{-- @if(Request::path() != "template") --}}
            <x-admin_sidebar  :user="$user"  :adscounter="$adscounter" />
        {{-- @endif --}}
    @endif
    <div class="content-page">
        <div class="content" style="margin-bottom: 2%;">
                <!-- Start Content-->
            <div class="container-fluid">
                <div class="templatediv">
                    @yield('content')
               </div>
          </div> 
       </div>
	
{{-- </div> --}}
<!-- END wrapper -->

<!-- Footer Start -->
{{-- <footer class="footer" style="position: absolute;">
    <div class="container-fluid" style="">
        <div class="row">
            <div class="col-md-6">
                {{date('Y')}}   &copy;<a href="#"> <span style="color:#FE6161"> MagiCopy</span></a>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <span>Developed by: <a href="http://techuire.com/" target="_blank">Techuire</a></span>
            </div>
        </div>
    </div>
</footer>
 --}}<!-- end Footer -->

</div>
</div>
{{-- <x-admin_rightbar  /> --}}


<!-- Right bar overlay-->

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.1/select2.min.js" integrity="sha512-nyIg3+A3n8Ja7rAIC/wFROz+g0JD46CG5PCHdZ/j0dSZ8yBgsMUXM4cjeI2Lgd5htIPaZgRfFs4y+LBUG9BSKA==" crossorigin="anonymous"></script> --}}

<!-- Vendor js -->
<script src="{{asset('assets/admin')}}/js/vendor.min.js"></script>

<!-- Plugins js-->
{{-- <script src="{{asset('assets/admin')}}/libs/flatpickr/flatpickr.min.js"></script> --}}
{{-- <script src="{{asset('assets/admin')}}/libs/apexcharts/apexcharts.min.js"></script> --}}

<script src="{{asset('assets/admin')}}/libs/selectize/js/standalone/selectize.min.js"></script>

<!-- Dashboar 1 init js-->
<script src="{{asset('assets/admin')}}/js/pages/dashboard-1.init.js"></script>

<!-- App js-->
<script src="{{asset('assets/admin')}}/js/app.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    

    $('.contentdiv').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('data-index');  
        getArticles(url);
    });

    function getArticles(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $(".contentdiv").html(data.page);
            changePaginationUrl();
        }).fail(function () {
            swal({
                title: "Oops!",
                text: "Something went wrong.",
                buttons: true,
                dangerMode: true,
            });
        });
    }
    
    function getallContent() {
        $.ajax({
            url: "{{ url('get-all-contents') }}",
            method:"get",
            cache: false,
            success: function(result){
                if(result.status == true) {
                    console.log(result.page);
                    $(".contentdiv").html(result.page);
                    changePaginationUrl();
                } else {
                    swal({
                        title: "Oops!",
                        text: "Something went wrong.",
                        buttons: true,
                        dangerMode: true,
                    });
                }
            },error:function(error) {
                swal({
                    title: "Oops!",
                    text: "Something went wrong.",
                    buttons: true,
                    dangerMode: true,
                });
            }
        });
    }

    function changePaginationUrl() {
        $(".pagination a").each(function() {
            var url =  $(this).attr('href');
            $(this).attr('data-index',url);
            $(this).attr('href', '');
        });
    }   
</script>

</body>
</html>


