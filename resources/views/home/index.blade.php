@extends('layouts/mainuser')
@section('content')
<style>
    .pricing-item li.pricing-header {

        text-align: left !important;
    }

    .btn-theme.border {
        background-color: #fe5858 !important;
        color: #ffffff !important;
    }

    .btn-theme.border:hover {
        background-color: #ffffff !important;
        color: #fe5858 !important;
    }
</style>
<div id="app">
    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area responsive-top-pad inc-shape text-default banner-areahead">
        <div class="container">
            <div class="double-items">
                <div class="row align-center" style="margin-top: 11%;">

                    @php
                    $main_content_text = json_decode($page_content->main_content);
                    @endphp
                    @if($main_content_text->main_content_display=='true')
                    <div class="col-lg-5 info shape">
                        @if(!empty($main_content_text->main_content_heading))
                        <h2 class="wow fadeInDown" data-wow-duration="1s">{{$main_content_text->main_content_heading}}</strong></h2>
                        @endif
                        @if(!empty($main_content_text->main_content_text))
                        <p class="wow fadeInLeft" data-wow-duration="1.5s">

                            {{$main_content_text->main_content_text}}
                        </p>
                        @endif
                        <div class="bottom">
                            <a class="btn btn-md btn-gradient wow fadeInDown" style="border-radius: 50px;" data-wow-duration="1.8s" href="#">Get Started - Free!</a>

                            <a href="#watch" class="video-btn wow fadeInUp"><i class="fas fa-play"></i>Watch Video</a>
                        </div>
                        <span style="margin-left: 37px; color: #4c545a96;">No credit card required</span>
                    </div>

                    <!-- <div class="col-lg-5 offset-lg-1 width-140 thumb wow fadeInRight" data-wow-duration="1s">
                            <img src="{{asset('assets')}}/frontend/img/illustration/2.png" alt="Thumb">
                        </div> -->
                    <div class="col-lg-6 offset-lg-1 width-140 thumb wow fadeInRight">
                        <div id="carouselExampleIndicators" class="carousel slide carouselhead" data-ride="carousel">
                            <ol class="carousel-indicators" style="left: 40%;">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" style="box-shadow: 20px 20px 14px #fe7474;">
                                @if(!empty($main_content_text->file))
                                @foreach($main_content_text->file as $key=>$value)
                                <div class="carousel-item {{$key==0 ?'active':''}} ">
                                    <img class="d-block w-100" src="{{asset('public/assets/page-content')}}/{{$value}}" alt="First slide">
                                </div>
                                @endforeach
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('assets')}}/frontend/img/gif/1.gif" alt="Third slide">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start How it Works
        ============================================= -->

    @php
    $content1 = json_decode($page_content->content1);
    @endphp
        <div class="container thisconcount">
            <div class="row">
                @if(!empty($content1->content1_display) && $content1->content1_display=='true')
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row hiwnumbersrow">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                            <p class="hiwnumbers">1</p>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                            <h3 class="hiwheads">{{!empty($content1->content1_heading)?$content1->content1_heading:''}}</h3>
                        </div>
                    </div>
                    <h5>{{!empty($content1->content1_text)?$content1->content1_text:''}}</h5>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('public/assets/page-content')}}/{{!empty($content1->file)?$content1->file:''}}" class="img img-responsive">
                </div>
                @endif
            </div><br><br>
            <div class="row">
                @php
                $content2 = json_decode($page_content->content2);
                @endphp
                @if(!empty($content2->content2_display) && $content2->content2_display=='true')
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('public/assets/page-content')}}/{{!empty($content2->file)?$content2->file:''}}" class="img img-responsive">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row hiwnumbersrow">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                            <p class="hiwnumbers">2</p>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                            <h3 class="hiwheads">{{!empty($content2->content2_heading)?$content2->content2_heading:''}}</h3>
                        </div>
                    </div>
                    <h5>{{!empty($content2->content2_text)?$content2->content2_text:''}}</h5>
                </div>
                @endif
            </div><br><br>
            <div class="row">
                @php
                $content3 = json_decode($page_content->content3);
                @endphp
                @if(!empty($content3->content3_display) && $content3->content3_display=='true')
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row hiwnumbersrow">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                            <p class="hiwnumbers">3</p>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                            <h3 class="hiwheads">{{!empty($content3->content3_heading)?$content3->content3_heading:''}}</h3>
                        </div>
                    </div>
                    <h5>{{!empty($content3->content3_text)?$content3->content3_text:''}}</h5>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('public/assets/page-content')}}/{{$content3->file}}" class="img img-responsive">
                </div>
                @endif
            </div><br><br>
        </div>
    <!-- Ends How it Works
    ============================================= -->


    @php
    $content4 = json_decode($page_content->content4);
    @endphp
    @if(!empty($content4->content4_display) && $content4->content4_display=='true')
    <!-- Start Benefits
    ============================================= -->
    <div id="features" class="our-features-area relative default-padding">
        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url({{asset('assets')}}/frontend/img/shape/11.png);"></div>
        <!-- Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="area-title">{{!empty($content4->content4_heading)?$content4->content4_heading:''}}</h2>
                        <div class="devider"></div>
                        <p>
                            {{!empty($content4->content4_text)?$content4->content4_text:''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="feature-items text-center">
                <div class="row">
                    <!-- Single Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-website"></i>
                            </div>
                            <div class="info">
                                <h4>{{!empty($content4->content4_section1_heading)?$content4->content4_section1_heading:''}}</h4>
                                <p>
                                    {{!empty($content4->content4_section1_text)?$content4->content4_section1_text:''}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-integration"></i>
                            </div>
                            <div class="info">
                                <h4>{{!empty($content4->content4_section2_heading)?$content4->content4_section2_heading:''}}</h4>
                                <p>
                                    {{!empty($content4->content4_section2_text)?$content4->content4_section2_text:''}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->

                    <!-- End Single Item -->
                    <!-- Single Item -->

                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="icon">
                                <i class="flaticon-drag"></i>
                            </div>
                            <div class="info">
                                <h4>{{!empty($content4->content4_section3_heading)?$content4->content4_section3_heading:''}}</h4>
                                <p>
                                    {{!empty($content4->content4_section3_text)?$content4->content4_section3_text:''}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->

                    <!-- End Single Item -->
                </div>
            </div>

        </div>
    </div>
    @endif
    @php
    $content8 = json_decode($page_content->content8);
    @endphp
    @if(!empty($content8->content8_display) && $content8->content8_display=='true')

        <div class="banner-area solid-nav text-capitalized auto-height text-center text-light bg-theme bg-cover" style="background-color: inherit;" id="watch">
            <div class="container">
                <div class="content-box" style="background-image: url('{{asset('public/assets/page-content')}}/{{!empty($content8->file)?$content8->file:''}}'); margin-bottom: 10px; background-repeat: round; border: 12px solid #ececea;">
                    <div class="row align-center">
                        <div class="col-lg-8 offset-lg-2 info">
                            {{-- https://www.youtube.com/watch?v=owhuBrGIOsE --}}
                            <a class="popup-youtube relative video-play-button" href="{{!empty($content8->content8_vedio_url)?$content8->content8_vedio_url:''}}">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <div class="col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="1s">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape -->

            <!-- End Shape -->
        </div>
    @endif
    <!-- End Our Benefits -->
    <!-- Start Testimonials 
    ============================================= -->
    <div class="testimonials-area default-padding">

        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url({{asset('assets')}}/frontend/img/map.svg);"></div>
        <!-- Fixed BG -->
        <div class="items">
            <div class="card" style="position: relative;
                display: flex;
                width: 350px;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: rgb(255 255 255 / 40%);
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 11px;
                -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
                box-shadow: 0px 0px 5px 0px rgb(161, 163, 164); padding: 2rem 3rem 2rem 3rem;">
                <div class="card-body" style="padding: 0px;">

                    <div class="template-demo">
                        <p>Online reviews can make or break a customer's decision to make a purchase. Read about these customer review sites where your customers'</p>
                    </div>
                    <hr style="border-top: 1px solid #0000001a; margin-top: 90px;">
                    <div class="row">
                        <div class="col-sm-2"> <img class="profile-pic" src="https://img.icons8.com/bubbles/100/000000/edit-user.png"> </div>
                        <div class="col-sm-10">
                            <div class="profile">
                                <h4 class="cust-name">Delbert Simonas</h4>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="position: relative;
                display: flex;
                width: 350px;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: rgb(255 255 255 / 40%);
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 11px;
                -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
                box-shadow: 0px 0px 5px 0px rgb(161, 163, 164); padding: 2rem 3rem 2rem 3rem;">
                <div class="card-body" style="padding: 0px;">

                    <div class="template-demo">
                        <p>When you think of Apple you automatically think expensive if your anything like me. When purchasing this laptop I was skeptical on laptops i purchased.</p>
                    </div>
                    <hr style="border-top: 1px solid #0000001a; margin-top: 90px;">
                    <div class="row">
                        <div class="col-sm-2"> <img class="profile-pic" src="https://img.icons8.com/bubbles/100/000000/edit-user.png"> </div>
                        <div class="col-sm-10">
                            <div class="profile">
                                <h4 class="cust-name">Tikoh Amin</h4>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="position: relative;
                display: flex;
                width: 350px;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: rgb(255 255 255 / 40%);
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 11px;
                -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
                box-shadow: 0px 0px 5px 0px rgb(161, 163, 164); padding: 2rem 3rem 2rem 3rem;">
                <div class="card-body" style="padding: 0px;">

                    <div class="template-demo">
                        <p>I’ve wanted a MacBook for a while now because of the build quality and the simplicity of the OS. I spend an average 6 hours a day using it for college and the battery still has a fair.</p>
                    </div>
                    <hr style="border-top: 1px solid #0000001a; margin-top: 90px;">
                    <div class="row">
                        <div class="col-sm-2"> <img class="profile-pic" src="https://img.icons8.com/bubbles/100/000000/edit-user.png"> </div>
                        <div class="col-sm-10">
                            <div class="profile">
                                <h4 class="cust-name">Malachi Lensing</h4>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="position: relative;
                display: flex;
                width: 350px;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: rgb(255 255 255 / 40%);
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 11px;
                -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
                box-shadow: 0px 0px 5px 0px rgb(161, 163, 164); padding: 2rem 3rem 2rem 3rem;">
                <div class="card-body" style="padding: 0px;">

                    <div class="template-demo">
                        <p>This MacBook has excellent processing speed. The screen is crystal clear and I really enjoy the touchbar. I set up the fingerprint reader.</p>
                    </div>
                    <hr style="border-top: 1px solid #0000001a; margin-top: 90px;">
                    <div class="row">
                        <div class="col-sm-2"> <img class="profile-pic" src="https://img.icons8.com/bubbles/100/000000/edit-user.png"> </div>
                        <div class="col-sm-10">
                            <div class="profile">
                                <h4 class="cust-name">Christian Isla</h4>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="position: relative;
                display: flex;
                width: 350px;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: rgb(255 255 255 / 40%);
                background-clip: border-box;
                border: 1px solid #d2d2dc;
                border-radius: 11px;
                -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
                box-shadow: 0px 0px 5px 0px rgb(161, 163, 164); padding: 2rem 3rem 2rem 3rem;">
                <div class="card-body" style="padding: 0px;">

                    <div class="template-demo">
                        <p>For the last 10 years, I have owned an old Gateway laptop. Although it was amazing and lasted me, it was time for an upgrade. I own an Apple phone so I decided to look into a computer.</p>
                    </div>
                    <hr style="border-top: 1px solid #0000001a; margin-top: 90px;">
                    <div class="row">
                        <div class="col-sm-2"> <img class="profile-pic" src="https://img.icons8.com/bubbles/100/000000/edit-user.png"> </div>
                        <div class="col-sm-10">
                            <div class="profile">
                                <h4 class="cust-name">Lori Charles</h4>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="site-heading text-center">
                            <h2 class="area-title">Customers Review</h2>
                            <div class="devider"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="testimonial-items text-center">
                            <div class="carousel slide" data-ride="carousel" id="testimonial-carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <i class="flaticon-left-quotes-sign"></i>
                                        <p>
                                            Instrument or do connection no appearance do invitation. Dried quick round it or order. Add past see west felt did any. Say out noise you taste merry. 
                                        </p>
                                        <span>CEO of Sasoft</span>
                                        <h4>Junl Sarukh</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <i class="flaticon-left-quotes-sign"></i>
                                        <p>
                                            Instrument or do connection no appearance do invitation. Dried quick round it or order. Add past see west felt did any. Say out noise you taste merry.  
                                        </p>
                                        <span>Director of Sasoft</span>
                                        <h4>Anil Spia</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <i class="flaticon-left-quotes-sign"></i>
                                        <p>
                                            Instrument or do connection no appearance do invitation. Dried quick round it or order. Add past see west felt did any. Say out noise you taste merry. 
                                        </p>
                                        <span>Developer of Sasoft</span>
                                        <h4>Paul Munni</h4>
                                    </div>
                                </div>
                                <!-- End Carousel Content 

                                
                                <ol class="carousel-indicators">
                                    <li data-target="#testimonial-carousel" data-slide-to="0" class="active">
                                        <img src="{{asset('assets')}}/frontend/img/li.png" alt="Thumb">
                                    </li>
                                    <li data-target="#testimonial-carousel" data-slide-to="1">
                                        <img src="{{asset('assets')}}/frontend/img/li.png" alt="Thumb">
                                    </li>
                                    <li data-target="#testimonial-carousel" data-slide-to="2">
                                        <img src="{{asset('assets')}}/frontend/img/li.png" alt="Thumb">
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
    </div>
    <!-- End Testimonials -->

    <!-- Start Why Choose Us 
    ============================================= -->
    <!--<div class="chooseus-area inc-technology relative left-border bg-gray default-padding-top">
            <div class="container">
                <div class="row">


                    <div class="info col-lg-6">
                        <h5>Why choose us</h5>
                        <h2 class="area-title">Create your app page <br> with expert developer</h2>
                        <ul>
                            <li>
                                <h5>First Working Process</h5>
                                <p>
                                    Hardly suffer wisdom wishes valley as an. As friendship advantages resolution it alteration stimulated he or increasing. 
                                </p>
                            </li>
                            <li>
                                <h5>Dedicated Team Member</h5>
                                <p>
                                    Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery. 
                                </p>
                            </li>
                            <li>
                                <h5>24/7 Hours Support</h5>
                                <p>
                                    Hardly suffer wisdom wishes valley as an. As friendship advantages resolution it alteration stimulated he or increasing. 
                                </p>
                            </li>
                        </ul>
                        <div class="technology">
                            <h4>Technology we use</h4>
                            <div class="icon">
                                <i class="fab fa-java"></i>
                                <i class="fab fa-node-js"></i>
                                <i class="fab fa-php"></i>
                                <i class="fab fa-python"></i>
                                <i class="fab fa-mailchimp"></i>
                            </div>
                        </div>
                    </div>


                    <div class="thumb width-120 col-lg-6">
                        <img src="{{asset('assets')}}/frontend/img/illustration/6.png" alt="Thumb">
                    </div>

                </div>
            </div>
        </div>-->
    <!-- End Choose us Area -->
    @php
    $content5 = json_decode($page_content->content5);
    @endphp
    @if(!empty($content5->content5_display) && $content5->content5_display=='true')

    <!-- Start Overview 
    ============================================= -->
    <div id="overview" class="overview-area overflow-hidden default-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="area-title">{{!empty($content5->content5_heading)?$content5->content5_heading:''}}</h2>
                        <div class="devider"></div>
                        <p>
                            {{!empty($content5->content5_text)?$content5->content5_text:''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="overview-items">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="tabs" class="nav nav-tabs overviewnav">
                            <li class="nav-item">
                                <a href="#" data-target="#tab1" data-toggle="tab" class="active nav-link">Facebook Ads</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-target="#tab2" data-toggle="tab" class="nav-link">Product Descriptions</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-target="#tab3" data-toggle="tab" class="nav-link">Amazon Listings</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-target="#tab4" data-toggle="tab" class="nav-link">Amazon Listings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div id="tabsContent" class="tab-content wow fadeInUp" data-wow-delay="0.5s">
                            <div id="tab1" class="tab-pane fade active show">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/frontend/img/dashboard/1.jpg" alt="Thumb">
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/frontend/img/dashboard/2.jpg" alt="Thumb">
                                </div>
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/frontend/img/dashboard/3.jpg" alt="Thumb">
                                </div>
                            </div>
                            <div id="tab4" class="tab-pane fade">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/frontend/img/dashboard/4.jpg" alt="Thumb">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Overview -->
    @endif
    @php
    $content6 = json_decode($page_content->content6);
    @endphp
    @if(!empty($content6->content6_display) && $content6->content6_display=='true')

    <!-- Star Faq
    ============================================= -->
    <div class="faq-area default-padding-top">
        <div class="container">
            <div class="faq-items">
                <div class="row align-center">

                    <!--<div class="col-lg-6">
                            <div class="thumb wow fadeInLeft" data-wow-delay="0.5s">
                                <img src="{{asset('assets')}}/frontend/img/illustration/9.png" alt="Thumb">
                            </div>
                        </div>-->

                    <div class="col-lg-12">
                        <div class="faq-content">
                            <h2 class="area-title">{{!empty($content6->content6_heading)?$content6->content6_heading:''}}</h2>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h4 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{!empty($content6->content6_question1)?$content6->content6_question1:''}}
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>
                                                {{!empty($content6->content6_answer1)?$content6->content6_answer1:''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{!empty($content6->content6_question2)?$content6->content6_question2:''}}
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>
                                                {{!empty($content6->content6_answer2)?$content6->content6_answer2:''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            {{!empty($content6->content6_question3)?$content6->content6_question3:''}}
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>
                                                {{!empty($content6->content6_answer3)?$content6->content6_answer3:''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->
    @endif
    @php
    $content7 = json_decode($page_content->content7);
    @endphp
    @if(!empty($content7->content7_display) && $content7->content7_display=='true')

    <!-- Start Pricing Area
    ============================================= -->
    <div id="pricing" class="pricing-area bottom-less" style="background-image: linear-gradient(to bottom, #fe5858, #fd5f5fa6); padding: 60px 0px 30px 0px;
        margin-top: 60px;">
        <div class="container">
            <div class="pricing text-center">
                <div class="row">

                    <div id="pricing" class="pricing-area bottom-less">
                        <!-- Fixed Shape -->

                        <!-- End Fixed Shape -->

                        <div class="container">
                            <div class="pricing text-center">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 single-item">
                                        <div class="site-heading light text-center">
                                            <h2 class="area-title" style="">{{!empty($content7->content7_heading)?$content7->content7_heading:''}}</h2>
                                            <div class="devider"></div>
                                            <p style="">
                                                {{!empty($content7->content7_text)?$content7->content7_text:''}}
                                            </p>
                                            <div class="btn-group btn-group-toggle mt-3" data-toggle="buttons">

                                                <label class="btn btn-secondary bg-black month_button  text-white active" style="border-color: rgb(254, 88, 88);border-top-left-radius: 6px;border-bottom-left-radius: 6px;text-align: center !important;">

                                                    <input type="radio" name="duration" id="duration" autocomplete="off" value="month" checked> Monthly
                                                    @if(!empty($pakage->discount) && $pakage->discount>0)
                                                    <span class="badge">{{$pakage->discount}}% OFF</span>
                                                    @endif
                                                </label>
                                                @php
                                                $model = new App\models\Pricing;
                                                $yearly_pricing = $model->where('duration','year')->first();
                                                @endphp
                                                <label class="btn btn-secondary bg-white year_button  text-danger" style="border-color: rgb(254, 88, 88);text-align: center !important;">
                                                    <input type="radio" name="duration" id="duration" autocomplete="off" value="year"> Yearly
                                                    @if(!empty($yearly_pricing->discount) && $yearly_pricing->discount>0)
                                                    <span class="badge">{{$yearly_pricing->discount}}% OFF</span>
                                                    @endif

                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 single-item">
                                        <div class="pricing-item" style="text-align: left;">
                                            <ul>
                                                <li style="font-size: 40px;"><i class="fa fa-coffee" style="color: black;"></i></li>
                                                <li class="pricing-header">
                                                    <h4>Free Trial</h4>
                                                    <h2><sup>$</sup>0 / <sub id="pricing_time">Month</sub></h2>
                                                </li>
                                                <li><i class="fas fa-check-circle"></i> Every Content Template</li>
                                                <li><i class="fas fa-check-circle"></i> Limited Content Generation</li>
                                                <li class="footer" style="text-align: left;">
                                                    <a class="btn circle btn-theme border btn-sm btn-block" href="#">Get Started</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 single-item">

                                        <div class="pricing-item" style="text-align: left;">
                                            <ul>
                                                <li style="font-size: 40px;"><i class="fab fa-free-code-camp" style="color: black;"></i></li>
                                                <li class="pricing-header">
                                                    <div>
                                                        <h4>Growth</h4>
                                                        <h2 id="price_duration"><sup>$</sup>
                                                            @php
                                                            $price = !empty($pakage->price)?$pakage->price:'';
                                                            if($pakage->discount>0){
                                                            $percantageValue = $pakage->discount/100*$pakage->price;
                                                            $price = round($pakage->price-$percantageValue,2);

                                                            }
                                                            @endphp
                                                            {{$price}}
                                                            <sub>/ Month</sub>
                                                        </h2>
                                                    </div>
                                                </li>
                                                <li><i class="fas fa-check-circle"></i> Every Content Template</li>
                                                <li><i class="fas fa-check-circle"></i> Unlimited Content Generation</li>
                                                <li><i class="fas fa-check-circle"></i> Same Day Support</li>
                                                <li><i class="fas fa-check-circle"></i> Early Access to New Features</li>
                                                <li class="footer">
                                                    @if($isLoggedIn==true && $user['role']=='user')
                                                        <a href="#" class="btn circle btn-theme border btn-sm btn-block" data-toggle="modal" data-target="#pay-with-card">Pay with Card</a>
                                                    @else
                                                        <a class="btn circle btn-theme border btn-sm" id="CheckLogin" href="javascript:void(0)" style="width: 100%; border-radius: 50px;">Get Started</a>
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <pay-with-stripe :price="{{ $price }}"></pay-with-stripe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->
    @endif
    <!-- Start Clients
    ============================================= -->
    <div class="clients-area bg-theme text-light" style=" margin: 80px 0px 0px 0px;
        background: #fe5858; padding-top: 16px;">
        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url({{asset('assets')}}/frontend/img/shape/10.png);"></div>
        <!-- Fixed BG -->
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-8 info">
                    <h2>Trusted By The World's Best Companies</h2>
                </div>

                <div class="col-lg-4">
                    <div class="attr-nav light" style="padding-bottom: 19px;">
                        <ul>
                            @if($isLoggedIn==true)

                            <li class="button">
                                <a href="{{route('template')}}">Get Started - It's Free</a>
                            </li>
                            @else
                            <li class="button">
                                <a data-toggle="modal" data-target="#login-form">Get Started - It's Free</a>
                            </li>

                            @endif

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Clients -->
    
    
</div>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var base_url = "{{ url('/').'/' }}";
</script>
    <script type="text/javascript" src="{{ url('public/js/paywithstripe.js') }}"></script>
<script>
    $(document).ready(function() {

        $("input[name='duration']").click(function() {

            // $(this).closest('label').css("background-color", "black");
            $(this).closest('label').addClass('bg-secondary');

            $(this).closest('label').css("color", "#fe5858");
            price = '{{!empty($price)?$price:'
            '}}';
            var radioValue = $("input[name='duration']:checked").val();
            if (radioValue == 'year') {
                $('.year_button').removeClass('bg-white text-danger');
                $('.year_button').addClass('bg-secondary');
                $('.year_button').addClass('text-white');
                $('.month_button').css("background-color", "white");
                $('.month_button').removeClass('bg-secondary');
                $('.month_button').removeClass('text-white');
                $('.month_button').addClass('text-danger');
                // ajax request
                duration = $('#duration').val();
                $.ajax({
                    url: "{{url('fetch_price')}}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        'duration': 'year',
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        //  $('#discount').val(data.discount);

                        if (data.discount > 0) {
                            percantageValue = data.discount / 100 * data.price;
                            data.price = (data.price - percantageValue).toFixed(2);;

                        }
                        priceDuration = '<sup>$</sup>' + data.price + ' <sub>/ Year</sub>';
                        $('#price_duration').html(priceDuration);
                        $('#pricing_time').html('Year');

                    }
                })
                //end ajax

                $('#subscription_duration').val('year');

            }
            if (radioValue == 'month') {
                $('.month_button').removeClass('bg-white text-danger');
                $('.month_button').addClass('bg-secondary');
                $('.year_button').css("background-color", "white");
                $('.month_button').addClass('text-white');
                $('.year_button').removeClass('text-white');
                $('.year_button').removeClass('bg-secondary');
                $('#pricing_time').html('Month');
                priceDuration = '<sup>$</sup>' + price + ' <sub>/ Month</sub>';
                $('#price_duration').html(priceDuration);
                $('#subscription_duration').val('month');
            }
        });
    });

    $(document).on('click', '#CheckLogin', function(e) {
        $('#login-form').modal('show');
        return false;
        // swal({
        //         title: "Login?",
        //         text: "For subscription please Login!",
        //         icon: "warning",
        //         button: "OK!",
        //         dangerMode: true,
        //         }).then((ok) => {
        //             if(ok) {
        //                 $('#login-form').modal('show');
        //                 // window.location.replace('login');
        //             }
        //         })
    })
</script>
@endsection