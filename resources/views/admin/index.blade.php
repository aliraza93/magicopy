@extends('layouts/mainAdmin')
@section('content')
<div class="no-side-menu">
    <style>
        .cmuvkJ {
            border-radius: 15px;
            box-shadow: 1px 2px 15px -5px #000000b3;
            background: white;
            margin: 20px;
            display: inline-block;
            position: relative;
            cursor: pointer;
            width: 248px;
            height: 176px;
        }
        .esbyIi > h4{
            text-align: left;
            margin-left: 8px;
            font-weight: 600;
        }
        .esbyIi >p{
            text-align: left;
            margin-left: 9px;
            color: black;
        }
        .sc-iWFSnp:hover{
            border: 2px solid #fe5c5a;
        }
        .sc-iWFSnp:{
            border: 2px solid transparent!important;
        }
        .cmuvkJ {
            border-radius: 15px;
            box-shadow: 1px 2px 24px -5px #fe5c5a47;
            background: #fff;
            display: inline-block;
            position: relative;
            cursor: pointer;
        }
        .banner-image{
            height: 300px;
            background-image: url(assets/admin/images/template/background.png);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .banner-image p {
            font-size: 18px;
            color: #82858c;
                color: #fff;
        }
        .banner-image h3{
            font-size: 38px;
                color: #fff;
            font-weight: 500;
        }
        .esbyIi > h4:nth-child(2) {
            margin: 16px 0;
            margin-left: 8px;
        }
    </style>
    <div class="conatainer banner-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-image">
                    <h3>Welcome, {{ ucfirst($user['username']) }}</h3>
                    <p>What do you want to write today?</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between" style="margin: 21px 0px 0px 28px;">
        <h4><b>Browse</b></h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </div>
    <div class="row cards-body">

    <div class="col-lg-3">
        <a href="{{url('facebook-ad')}}">
            <div class="sc-iWFSnp cmuvkJ">
                <div class="sc-dRPiIx esbyIi">
                    <h4 style="text-align: left; font-weight: 600; margin-left: 9px;">
                        {{-- <i class="fab fa-facebook-f" aria-hidden="true"></i> --}}
                        <img class="img-fluid" src="{{asset('assets/admin/images/template/facebook.png')}}" alt="">
                    </h4>
                    <h4> New Facebook Ad </h4>
                    <p>A limitless supply of orignal Facebook Ad Copy </p>

                </div>
            </div>
       </a>
    </div>
<div class="col-lg-3">
       <a href="{{url('google-ad')}}">
            <div class="sc-iWFSnp cmuvkJ">
                <div class="sc-dRPiIx esbyIi">
                    <h4 style="text-align: left; font-weight: 600; margin-left: 9px;">
                        {{-- <i class="fab fa-google"></i> --}}
                        <img class="img-fluid" src="{{asset('assets/admin/images/template/google.png')}}" alt="">
                    </h4>
                    <h4>New Google Ad </h4>
                    <p >Create Google Ad with exact requirement and layouts</p>
                </div>
            </div>
        </a>
</div>
<div class="col-lg-3">
        <a href="{{url('product-description')}}">
            <div class="sc-iWFSnp cmuvkJ">
                <div class="sc-dRPiIx esbyIi" style="margin-top: 9px;">
                    <h4 style="text-align: left; font-weight: 600; margin-left: 9px;">
                        <img class="img-fluid" src="{{asset('assets/admin/images/template/regular.png')}}" alt="">
                        {{-- <i class="fab fa-product-hunt"></i> --}}
                    </h4>
                    <h4> Product Description </h4>
                    <p >Launching a new product? Let's couple it with a catchy product description.</p>
                </div>
            </div>
       </a>
</div>
<div class="col-lg-3">
       <a href="{{url('facebook-headline')}}">
            <div class="sc-iWFSnp cmuvkJ">
                <div class="sc-dRPiIx esbyIi" style="margin-top: 9px;">
                    <h4 style="text-align: left; font-weight: 600; margin-left: 9px;">
                        <img class="img-fluid" src="{{asset('assets/admin/images/template/facebook.png')}}" alt="">
                    </h4>
                    <h4> Facebook Headline </h4>
                    <p >Launching a new headline with a catchy product description.</p>
                </div>
            </div>
        </a>
</div>
<div class="col-lg-3">
    <a href="{{url('copypaste')}}">
        <div class="sc-iWFSnp cmuvkJ">
            <div class="sc-dRPiIx esbyIi" style="margin-top: 9px;">
                <h4 style="text-align: left; font-weight: 600; margin-left: 9px;">
                    <img class="img-fluid" src="{{asset('assets/admin/images/template/regular.png')}}" alt="">
                        {{-- <i class="fas fa-copy"></i> --}}
                    </h4>
                    <h4> Content Improver </h4>
                    <p >Launching a new product? Let's couple it with a Copy & Paste catchy product description.</p>
                </div>
            </div>
       </a>
</div>
    </div>
   {{-- <a href="{{url('facebook-ad')}}">
      <div class="sc-iWFSnp cmuvkJ">
        <div class="sc-dRPiIx esbyIi">
            <div>New facebook Ad </div>
        </div>
      </div>
   </a> --}}
</div>
<script>
    $( document ).ready(function() {
            // $('.navbar-custom').toggleClass('opend');
            // $('.left-side-menu').toggleClass('opend');
            $('.navbar-custom').removeClass('opend');
            $('.left-side-menu').removeClass('opend');
            $('body').attr('data-sidebar-size', 'condensed');
    });
    
</script>
@endsection