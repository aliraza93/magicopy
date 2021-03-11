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
    .liTBVH {
        /* margin-top: 130px; */
        /* padding: 50px; */
        width: 100%;
        overflow: auto;
        height: calc(100% - 130px);
        text-align: center;
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
            <div class="page-title-right"> </div>
            <h4 class="page-title">Facebook headline</h4>
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
                <form action="copypaste" id="add_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div style="margin-bottom: 20px; margin-top: 20px; width: 100%;">
                                <div class="CompanyName">
                                    <input type="hidden" name="category" value="{{encrypt($category)}}"> 
                                    <div class="form-group">Brand Name<span style="color: red;"> *</span></div>
                                    <input type="text" name="Company"  placeholder="e.g. Candlesmith" class="form-control"  value="{{ old('Company') }}">
                                    <span class="error" id="Company_error"></span>
                                </div>
                            </div>
                            <div style="margin-bottom: 20px; margin-top: 20px; width: 100%;">
                                <div style="position: relative;">
                                    <div>
                                        <div class="form-group">Company or Product Description<span style="color: red;"> *</span></div>
                                        <textarea type="text"
                                            name="CompanyDescription"
                                            placeholder="e.g. Candlesmith sells organic, eco-friendly soy-based candles. Our candles are hand-poured in London, UK."
                                            class="form-control">{{old('CompanyDescription')}}</textarea>
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
                                    <input type="text" id="AddKeywordstags" name="add_keywords" value="{{old('add_keywords')}}" class="form-control" multiple="multiple">
                                        <span class="error" id="addkeywords_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="MuiCollapse-container MuiCollapse-hidden" style="min-height: 0px;">
                            <div class="MuiCollapse-wrapper">
                                <div class="MuiCollapse-wrapperInner">
                                    <div class="MuiPaper-root MuiAlert-root MuiAlert-standardError MuiPaper-elevation0"
                                        role="alert">
                                        <div class="MuiAlert-message">Please fill in all required elements and
                                            try
                                            again. Tip: You need to press 'enter' after entering keywords!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: center;">
                            <h5 class="plz_wait"><img style="width:50%;" src="{{asset('assets/admin/loader/please_wait.gif')}}"></h5>
                            @if($adscounter >0 && empty($user['subscription']['status']) || !empty($user['subscription']['status']) && $user['subscription']['status']=='active')
                                <button type="button" id="submit_btn" class="sc-dkIXFM fkyVgZ">Generate</button>
                                @else
                                <h5 class="text-danger">Please purchase offer to generate Ads</h5>
                            @endif
                            <h5 class="text-danger" class="error_msg"></h5>
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
        <div class="card-box">
            <div class="sc-dFJsGO liTBVH">
                <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
                </div><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane"
                    class="svg-inline--fa fa-paper-plane fa-w-16 fa-5x" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    style="top: 21rem; right: 21%;width:80px; transform: rotate(20deg); color: rgb(170, 170, 170);">
                    <path fill="currentColor"
                        d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z">
                    </path>
                </svg>
                <div
                    style="top: 29rem; right: 10%; left: 61%; font-size: 1rem; font-weight: 400; line-height: 1.5rem; color: rgb(86, 86, 86); text-align: center;">
                    Your Product Ads are empty right now.<br>When you generate new ads they will appear here.
                </div>
            </div>
        </div> <!-- end card-box -->
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
    $url = "{{url('facebook-headline')}}";
    $.ajax({
      url: $url,
      type: "POST",
      dataType: 'json',
      data: $('#add_form').serializeArray(),
      success: function (data) {
        $('.plz_wait').hide();
        $("#submit_btn").fadeIn();
        $('.plz_wait').hide();
          $("#submit_btn").show();
        if(data.response==true){
            $('.trail-quantity').text($('.trail-quantity').text()-1);
            $('.edemjN').html(data.ads);
        } else {
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
