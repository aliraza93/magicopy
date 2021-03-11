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

</style>
<!-- Start Page Content here -->
<!-- ============================================================== -->

<link href="{{asset('assets/admin') }}/libs/tagsinput/taginput.css"
rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
<script src="{{asset('assets/admin') }}/libs/tagsinput/taginput.js"></script>



            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                          
                            {{-- <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Magicopy</a><i class="fas fa-arrow-right"></i></li>
                                
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ads</a></li>
                                <li class="breadcrumb-item active">Content Improver</li>
                                <li class="breadcrumb-item active">edit</li>
                            </ol> --}}
                        </div>
                        <h4 class="page-title">Content Improver</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



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
                                            <div class="form-group">Company Name<span style="color: red;">
                                                    *</span></div>
                                            <input type="text" name="Company"  placeholder="e.g. Candlesmith" class="form-control" value="{{$ad_info['company_name']}}">
                                              
                                            <span class="error" id="Company_error"></span>
                                              
                                        </div>

                                    </div>
                                    <div style="margin-bottom: 20px; margin-top: 20px; width: 100%;">
                                        <div style="position: relative;">
                                            <div>
                                                <div class="form-group">Company or Product Description<span
                                                        style="color: red;"> *</span>
                                                    </div>
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
                                            <label for="add_keyword">Brand Keywords <span
                                                style="color: red;"> *</span></label>
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

                                    <button type="button" id="submit_btn" class="sc-dkIXFM fkyVgZ">Update</button>
                                    @else
                                    <h5 class="text-danger">Please purchase offer to generate Ads</h5>
                                  @endif
                                  <h5 class="text-danger error_msg"></h5>
                                    {{-- <div style="margin-top: 10px;"><span style="color: red;">9</span>&nbsp;credits are
                                        left
                                        in your free trial.</div> --}}
                                    <p style="margin-top: 10px; color: grey; font-size: 12px;">This generation uses
                                        <b>1</b>
                                        credit, and generates 5 - 15 pieces of new content. All content is saved by
                                        default,
                                        so if the first set isn't perfect, try again!<br><br></p>
                                </div>
                        </form>
                    </div> <!-- end card-box -->
                </div>
            </div> <!-- end col-->

            <div class="col-lg-6 sc-bXDlPE sc-ctaXAZ jFuWAH edemjN">
                <style>
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
                        height: 78px;
                        border-bottom: 1px solid rgb(220, 220, 220);
                        background-color: rgb(240, 242, 245);
                        font-family: Helvetica, Open Sans;
                        font-size: 1rem;
                        color: rgb(101, 103, 107);
                    }
             
                </style>
               
                     @foreach($ads as $value)
                        <div class="sc-XhUPp kiNLFp" >
                            <div style="cursor: pointer; position: relative;">
                                <div class="companyInfoContainer">
                                    {{-- <img src="{{asset('assets')}}/admin/images/ads/megamenu-bg.png" alt="Copysmith Logo"
                                        style="width: 40px; border-radius: 50%; border: 1px solid rgb(230, 230, 230);"> --}}
                                    <!--<div class="sc-hkwnrn jOcitS">-->
                                    <!--    <div style="color: rgb(8, 8, 8); font-size: 0.9125rem;"><b>{{$value['title']}}</b></div>-->
                                    <!--</div>-->
                            <!--         <div style="color: rgb(101, 103, 107); font-size: 0.85rem;">Sponsored · <img-->
                            <!--src="https://i.imgur.com/hDk78b9.png" alt="Earth Icon"-->
                            <!--style="width: 12px; margin-top: -2px;"></div>-->
                                </div>
                                <div style="margin-top:1.175rem; color: rgb(5, 5, 5);">
                                    <div id="mainContent" style="font-size: 0.925rem;">{{$value['description']}}.</div>
                                </div>
                           
                            </div>
                            <!--<hr style="width: calc(100% + 8px); margin-left: -4px;">-->
                          
                        </div>
                        @endforeach
                   
            </div> <!-- end col -->
        


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
    $url = "{{url('update/copypaste-ad')}}";  
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
