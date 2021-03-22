<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sasoft - Software Landing Page">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ========== Page Title ========== -->
    <title>{{ config('app.name') }}</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('assets')}}/frontend/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{asset('assets')}}/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/themify-icons.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/flaticon-set.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/magnific-popup.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/animate.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/bootsnav.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/frontend/css/responsive.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/frontend/css/landing-style.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    {{-- js  --}}
    <script src="{{asset('assets')}}/frontend/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('assets')}}/frontend/js/html5/html5shiv.min.js"></script>
      <script src="{{asset('assets')}}/frontend/js/html5/respond.min.js"></script>
    <![endif]-->
    @php
    $tag = new App\Models\Gtag;
    $tag = $tag->where('id','>',0)->first();
    echo !empty($tag)?''.$tag->text.'':'';
    @endphp
   
    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <style type="text/css">
        @media screen and (max-width: 1024px) {
        .carouselhead{
            width: 400px; 
            height: 400px;
        }
    .banner-area .info.shape {
        margin-top: 110px;
    }
    }
    .carouselhead{
            width: 450px; 
            height: 450px;
        }
        .hiwnumbers{
            font-family: "Open Sans", sans-serif;
        left: -18px;
        position: relative;
        font-style: normal;
        font-weight: bold;
        font-size: 144px;
        line-height: 30px;
        color: #fe5c5a;
        }
        .banner-areahead{
            border-bottom: 1px solid #6c757d00;
            margin-bottom: 70px;
        }
        .hiwnumbersrow{
            padding-top: 25%;
        }
        h1, h2, h3, h4, h5, h6, p{
            font-family: poppins,Helvetica,Arial,sans-serif;
        }
        @media screen and (max-width: 500px){
            .banner-area .info.shape {
                margin-top: 0px;
            }
            .hiwheads{
                font-size: 36px;
                margin-top: -74px;
                text-align: left;
                margin-left: 45px;
            }
            .hiwnumbers{
                font-size: 105px;
            }
        }
        .hiwheads{
            font-size: 48px; margin-top: -40px;
        }
        .overviewnav{
            text-align: center !important;
        }
        .thumb{
            text-align: center !important;
        }
        .overviewnav li{
            display: inline-block !important;
            margin: 0px 12px !important;
        }
        .overview-area .nav-tabs {
            border: none !important;
            background: transparent !important;
            padding: 30px !important;
        }
        .overview-area .nav-tabs li a {
            color: #fe5858 !important;
        }
        .overview-area .nav-tabs li a, .overview-area .nav-tabs li a{
            color: black !important;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
            border-radius: 0px !important;
            border-color: #ffffff #ffffff #000 !important;
        }
        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color: transparent !important;
        }
        .overview-area .nav-tabs li a.active {
            border-bottom: 3px solid #fe5858 !important;
        }
    </style>
</head>


<body>

    <!-- Preloader Start -->
   <!-- <div class="se-pre-con"></div> -->
    <!-- Preloader Ends -->
    <x-userheader :isLoggedIn="$isLoggedIn" :user="$user" />
        @yield('content')
    <x-userfooter  />
    <!-- jQuery Frameworks
    ============================================= -->
    
    <script src="{{asset('assets')}}/frontend/js/jquery.appear.js"></script>
    <script src="{{asset('assets')}}/frontend/js/jquery.easing.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/modernizr.custom.13711.js"></script>
    <script src="{{asset('assets')}}/frontend/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/wow.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/progress-bar.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/count-to.js"></script>
    <script src="{{asset('assets')}}/frontend/js/YTPlayer.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/bootsnav.js"></script>
    <script src="{{asset('assets')}}/frontend/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/custom-google-animation.js"></script>
    
    @if(!empty(session('subscription')))
        <script>
            swal({
                title: "Congratulation",
                text: "{{session('subscription')}}",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
        </script>
    @endif
    
</body>
</html>