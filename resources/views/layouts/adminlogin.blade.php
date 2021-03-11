<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/modern/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 16:22:16 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Magic Copy - Generating Great Content</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets')}}/frontend/img/favicon.png">

		<!-- App css -->
		<link href="{{asset('assets')}}/admin/css/bootstrap-modern.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('assets')}}/admin/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('assets')}}/admin/css/bootstrap-modern-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{asset('assets')}}/admin/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{asset('assets')}}/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        {{-- jquery plugin --}}
        <script src="{{asset('assets')}}/admin/js/jquery.min.js"></script>

    </head>

    <body class="loading authentication-bg authentication-bg-pattern" style="background-color: aliceblue;">
    @yield('content')
    
    <footer class="footer footer-alt ">
        2015 - <script>document.write(new Date().getFullYear())</script> &copy; <a href="#" class="text-white-50"> <span style="color:#FE6161"> MagiCopy</span> </a> 
    </footer>

    <!-- Vendor js -->
    <script src="{{asset('assets')}}/admin/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{asset('assets')}}/admin/js/app.min.js"></script>
    
</body>

<!-- Mirrored from coderthemes.com/ubold/layouts/modern/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2021 16:22:16 GMT -->
</html>