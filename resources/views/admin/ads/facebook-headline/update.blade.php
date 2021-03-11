@extends('layouts/mainAdmin')
@section('content')
<style>
    .error{
        color: red;
    }
    .fkyVgZ {
        background-color:#FE6161;
        padding: 10px 40px;
        border: medium none;
        border-radius: 34px;
        box-shadow: rgba(83, 92, 165, 0.2) 0px 1px 2px 2px;
        color: white;
        font-size: 20px;
        margin-top: 30px;
    }

    .jFuWAH {
        height: 100%;
        width: 50vw;
    }

    .edemjN {
        background-color: rgb(242, 242, 242);
    }
    .kiNLFp {
        padding: 20px;
        background-color: white;
        border: 1px solid rgb(132, 141, 211);
        width: 100%;
        border-radius: 10px;
        /* margin-top: 20px; */
        margin-bottom: 20px;
    }
    .fNjRST {
        display: flex;
        -moz-box-pack: center;
        justify-content: center;
        -moz-box-align: center;
        align-items: center;
        width: calc(100% + 40px);
        margin-top: 10px;
        margin-left: -20px;
        height: 260px;
        border-top: 1px solid rgb(220, 220, 220);
        border-bottom: 1px solid rgb(220, 220, 220);
    }
    .jOcitS {
        /* position: relative; */
        left: 3rem;
        bottom: 2.25rem;
        font-family: Helvetica, Open Sans;
        line-height: 1.195rem;
    }
    .kxdBff {
        position: relative;
        width: calc(100% + 40px);
        margin-left: -20px;
        padding-left: 18px;
        padding-top: 8px;
        /* height: 78px; */
        border-bottom: 1px solid rgb(220, 220, 220);
        background-color: rgb(240, 242, 245);
        font-family: Helvetica, Open Sans;
        font-size: 1rem;
        color: rgb(101, 103, 107);
    }
</style>
<!-- Start Page Content here -->
<!-- ============================================================== -->

<link href="{{asset('assets/admin') }}/libs/tagsinput/taginput.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
<script src="{{asset('assets/admin') }}/libs/tagsinput/taginput.js"></script>

@php
    $currentUser = App\Models\User::where('id', $user['userID'])->first();
@endphp
{{-- project dorpdown --}}
<div class="proj-dropdown sidemenu-opend dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Projects
    <i class="fas fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <div class="project-wrap">
            <h5>New Project <a href="#" data-toggle="modal" data-target="#createProject"><i class="fas fa-plus"></i></a></h5>
            <ul>
                @foreach($currentUser->projects as $project)
                    <li class="{{ ($project->id == $currentUser->current_project) ? 'active' : '' }}">
                        <span class="project-avatar">{{ Str::ucfirst($project->name[0]) }}</span> 
                        <span class="project-item-name" data-id = "{{ $project->id }}" onClick="change_project(this)">{{ $project->name }}</span>
                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="#" data-toggle="modal" data-id="{{ $project->id }}" data-name="{{ $project->name }}" data-target="#createProject" onClick="rename_project(this)"><i class="fas fa-edit"></i> Rename</a></li>
                                <li><a href="#" data-id="{{ $project->id }}" onClick="delete_project(this)"><i class="fas fa-trash-alt"></i> Delete</a></li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </ul>
</div>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right"></div>
            <h4 class="page-title">Facebook Headline</h4>
        </div>
    </div>
</div>
<!-- end page title -->

{{-- Check Project --}}
@php
    $check_project = App\Models\ProjectsModel::where('user_id', $user['userID'])->count();
@endphp
@if($check_project == 0)
    <x-create_project />
@else
    <div class="row">
        <div class="col-lg-6" style="overflow: auto">
            <div class="card-box">
                <h4 class="header-title m-t-0"></h4>

                <form action="#" id="add_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div style="margin-bottom: 20px; margin-top: 20px; width: 100%;">
                                <div class="CompanyName">
                                    <input type="hidden" name="ad_id" value="{{encrypt($ad_info['id'])}}">
                                    <input type="hidden" name="category" value="{{encrypt($ad_info['ads_category'])}}"> 
                                    <div class="form-group">Company Name<span style="color: red;">*</span></div>
                                    <input type="text" name="Company"  placeholder="e.g. Candlesmith" class="form-control" value="{{$ad_info['company_name']}}">
                                    <span class="error" id="Company_error"></span>
                                </div>

                            </div>
                            <div style="margin-bottom: 20px; margin-top: 20px; width: 100%;">
                                <div style="position: relative;">
                                    <div>
                                        <div class="form-group">Company or Product Description<span style="color: red;"> *</span> </div>
                                            <textarea type="text"
                                            name="CompanyDescription"
                                            placeholder="e.g. Candlesmith sells organic, eco-friendly soy-based candles. Our candles are hand-poured in London, UK."
                                            class="form-control">{{$ad_info['discription']}}</textarea>
                                    </div>
                                    <span class="error" id="CompanyDescription_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="position: relative;">
                            <div style="margin-top: 20px;">
                                <div style="margin-bottom: 8px; margin-top: 8px; width: 100%;"></div>
                                <div class="form-group addKeyword-field" id="addKeyword-field-1">
                                    <label for="add_keyword">Brand Keywords <span style="color: red;"> *</span></label>
                                    <input type="text" id="AddKeywordstags" name="add_keywords" value="{{$ad_info['add_keywords']}}" class="form-control" multiple="multiple">
                                    <span class="error" id="addkeywords_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="MuiCollapse-container MuiCollapse-hidden" style="min-height: 0px;">
                            <div class="MuiCollapse-wrapper">
                                <div class="MuiCollapse-wrapperInner">
                                    <div class="MuiPaper-root MuiAlert-root MuiAlert-standardError MuiPaper-elevation0"
                                        role="alert">
                                        <div class="MuiAlert-message">
                                            Please fill in all required elements and try again. Tip: You need to press 'enter' after entering keywords!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: center;">
                            <h5 class="plz_wait"><img style="width:50%;" src="{{asset('assets/admin/loader/please_wait.gif')}}"></h5>
                            @if($adscounter >0 && empty($user['subscription']['status']) || !empty($user['subscription']['status']) && $user['subscription']['status']=='active')
                                <button type="button" id="submit_btn" class="sc-dkIXFM fkyVgZ">Update</button>
                            @else
                                <h5 class="text-danger">Please purchase offer to generate Ads</h5>
                            @endif
                            <h5 class="text-danger error_msg"></h5>
                            
                            <p style="margin-top: 10px; color: grey; font-size: 12px;">This generation uses
                                <b>1</b>
                                credit, and generates 5 - 15 pieces of new content. All content is saved by
                                default,
                                so if the first set isn't perfect, try again!<br><br>
                            </p>
                        </div>
                </form>
            </div> <!-- end card-box -->
        </div>
    </div> <!-- end col-->

    <div class="col-lg-6 sc-bXDlPE sc-ctaXAZ jFuWAH edemjN">
        @foreach($ads as $value)
            <div class="sc-XhUPp kiNLFp">
                <div style="cursor: pointer; position: relative;">
                    <div class="text-options">
                        <span class="top-icons copy-icon"><i class="fas fa-copy"></i></span>
                        <span class="top-icons delete-icon" data-id="{{$value['id']}}"><i class="fas fa-trash-alt"></i></span>
                    </div>
                    <div class="companyInfoContainer">
                        <div class="sc-hkwnrn jOcitS">
                            <div style="color: rgb(8, 8, 8); font-size: 0.9125rem;"><b>{{$value['title']}}</b></div>
                            <div style="color: rgb(101, 103, 107); font-size: 0.85rem;">Sponsored · 
                                <img src="https://i.imgur.com/hDk78b9.png" alt="Earth Icon" style="width: 12px; margin-top: -2px;">
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:1.175rem; color: rgb(5, 5, 5);"></div>
                    
                    <div class="sc-jvfriV kxdBff">
                        <div style="font-size: 0.7625rem;">{{$value['title']}}.com</div>
                        <div id="mainContent" style="font-size: 0.925rem;width: 72%;font-weight: 700;">
                            <p class="my-text">{{ $value['description'] }}...</p>
                        </div>
                        <div id="Headline" style="color: rgb(5, 5, 5); font-weight: 600; width: 360px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></div>
                        <div style="position: absolute; color: rgb(5, 5, 5); font-size: 0.9rem; font-weight: 600; text-align: center; padding-top: 0.5rem; top: 20px; right: 18px; width: 100px; height: 38px; border-radius: 6px; background: rgb(228, 230, 235) none repeat scroll 0% 0%;">
                            Shop Now
                        </div>
                    </div>
                    <div class="">
                        <img src="{{asset('assets/admin/facebook_ad.jpeg')}}" alt="Paper airplane illustration" style="width: 100%;">
                    </div>
                    
                </div>
                <hr style="width: calc(100% + 8px); margin-left: -4px;">
            </div>
        @endforeach
    </div> <!-- end col -->
@endif        


<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script>
$('.plz_wait').hide();

$('#AddKeywordstags').tagsInput({
    'unique': true,
});
$('#avoid_keyword').tagsInput({
    'unique': true,
});


$(document).on('click','#submit_btn',function(e){
    $('.error').empty();
    $("#submit_btn").hide();
    $('.plz_wait').fadeIn();
    $url = "{{url('update/facebook-headline')}}";  
    $.ajax({
      url: $url,
      type: "POST",
      dataType: 'json',
      data: $('#add_form').serializeArray(),
      success: function (data) {
          $('.plz_wait').hide();
          $("#submit_btn").show();
        if(data.response==true){
             $('.trail-quantity').text($('.trail-quantity').text()-1);
             $('.edemjN').html(data.ads);
        }
        else{
              $('.plz_wait').hide();
              $('.error_msg').html(data.msg);
              $("#submit_btn").fadeIn();
              $('#Company_error').html(data.Company_error);
              $('#CompanyDescription_error').html(data.CompanyDescription_error);
              $('#addkeywords_error').html(data.addkeywords_error);
             
        }
      }
    });
});
</script>

@endsection
