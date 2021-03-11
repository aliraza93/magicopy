@extends('layouts/mainAdmin')
@section('content')
<style>
    /*.col-6,.col-4 {*/
    /*    border: 1px solid;*/
    /*}*/
    .remove-gif {
        position: absolute;
        color: #F35D5D;
        margin-top: -8px;
        margin-left: -7px;
        }
        .fa-times {
        font-size: 20px;
        }
</style>
<div class="row" style="margin-top:3%">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(!empty(session('message')))
                  <div class="alert alert-success">{{session('message')}}</div>
                @endif
                {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <h1 style="text-align:center;margin-right: 69px;color: #fe5c5a;">Magic Copy</h1>
                <div class="row">
                    <div class="col-6">
                        <form action="{{url('manage-page')}}" method="post" id="main_content" enctype="multipart/form-data">
                            @csrf
                            <h5>Main Content</h5>
                            <div class="form-group">
                                @php
                                  $main_content_text = json_decode($page_content->main_content);
                                @endphp
                               
                                <div class="form-group">
                                      <label for=""></label>
                                      <select class="form-control" name="main_content_display" id="">
                                        <option value="true" {{$main_content_text->main_content_display=='true'?'selected=selected':''}}>Active</option>
                                        <option value="false" {{$main_content_text->main_content_display=='false'?'selected=selected':''}}>In Active</option>
                                      </select>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" type="text" value="{{$main_content_text->main_content_heading}}" name="main_content_heading"/>
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="main_content_text"  cols="30" rows="5">{{$main_content_text->main_content_text}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Upload Gif</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file[]" multiple >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($main_content_text->file))
                                 @foreach($main_content_text->file as $key=>$value)
                                 <input type="hidden" name="image[]" value="{{$value}}">
                                 <div class="col-2 ml-4 ">
                                     <a href="remove-gif/{{$key}}" class="remove-gif"><i class="fa fa-times"></i></a>
                                    <img style="width:113px;height:84px" src="{{asset('public/assets/page-content')}}/{{$value}}" alt="no image">
                                 </div>
                                 @endforeach
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" id="main-submit-button" class="btn btn-success">Update</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-6">
                        <form action="{{url('manage-page')}}" method="post" id="content-1" enctype="multipart/form-data">
                            @csrf
                            <h5>Content 1</h5>
                                @php
                                $content1 = json_decode($page_content->content1);
                                @endphp
                              
                                 <div class="form-group">
                                      <label for=""></label>
                                      <select class="form-control" name="content1_display" id="">
                                        <option value="true" {{$content1->content1_display=='true'?'selected=selected':''}}>Active</option>
                                        <option value="false" {{$content1->content1_display=='false'?'selected=selected':''}}>In Active</option>
                                      </select>
                                </div>
                           
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content1->content1_heading)?$content1->content1_heading:''}}" name="content1_heading"/>
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content1_text"  cols="30" rows="5">{{!empty($content1->content1_text)?$content1->content1_text:''}}</textarea>
                            </div>
                            <input type="hidden" name="image" value="{{!empty($content1->file)?$content1->file:''}}">
                            <div class="form-group">
                                <label for="my-input">Upload Image</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file" >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($content1->file))
                                 <div class="col-2 ml-4 ">
                                    <img style="width:113px;height:84px"  src="{{asset('public/assets/page-content')}}/{{$content1->file}}" alt="no image">
                                 </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" id="content1_submit">Update</button>
                            </div>
                        </form>
                    </div>
                     </div>
        </div>
        </div>
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form action="{{url('manage-page')}}" method="post" id="content-2" enctype="multipart/form-data">
                            @csrf
                            <h5>Content 2</h5>
                           
                                @php
                                $content2 = json_decode($page_content->content2);
                                @endphp
                               
                                <div class="form-group">
                                      <label for=""></label>
                                      <select class="form-control" name="content2_display" id="">
                                        <option value="true" {{$content2->content2_display=='true'?'selected=selected':''}}>Active</option>
                                        <option value="false" {{$content2->content2_display=='false'?'selected=selected':''}}>In Active</option>
                                      </select>
                                </div>
                            
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" name="content2_heading" type="text" value="{{!empty($content2->content2_heading)?$content2->content2_heading:''}}" />
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content2_text"  cols="30" rows="5">{{!empty($content2->content2_text)?$content2->content2_text:''}}</textarea>
                            </div>
                            <input type="hidden" name="image" value="{{!empty($content2->file)?$content2->file:''}}">
                            <div class="form-group">
                                <label for="my-input">Upload Image</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file" >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($content2->file))
                                 <div class="col-2 ml-4 ">
                                     <img style="width:113px;height:84px"  src="{{asset('public/assets/page-content')}}/{{$content2->file}}" alt="no image">
                                 </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" id="content2_submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{url('manage-page')}}" method="post" id="content3" enctype="multipart/form-data">
                            @csrf
                            <h5>Content 3</h5>
                            
                                @php
                                $content3 = json_decode($page_content->content3);
                                @endphp
                                  <div class="form-group">
                                      <label for=""></label>
                                      <select class="form-control" name="content3_display" id="">
                                        <option value="true" {{$content3->content3_display=='true'?'selected=selected':''}}>Active</option>
                                        <option value="false" {{$content3->content3_display=='false'?'selected=selected':''}}>In Active</option>
                                      </select>
                                </div>
                          
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" name="content3_heading" type="text" value="{{!empty($content3->content3_heading)?$content3->content3_heading:''}}" />
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content3_text"  cols="30" rows="5">{{!empty($content3->content3_text)?$content3->content3_text:''}}</textarea>
                            </div>
                            <input type="hidden" name="image" value="{{!empty($content3->file)?$content3->file:''}}">
                            <div class="form-group">
                                <label for="my-input">Upload Image</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file" >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($content3->file))
                                 <div class="col-2 ml-4 ">
                                    <img style="width:113px;height:84px"  src="{{asset('public/assets/page-content')}}/{{$content3->file}}" alt="no image">
                                 </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" id="content3_submit">Update</button>
                            </div>
                        </form>
                       
                    </div>
                    
                    
                </div>
                  </div>
                    </div>
                <form action="{{url('manage-page')}}" method="post" id="content_4" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                     <div class="card-body">
                <div class="row">
                    
                            <div class="col-12" >
                                <h5>Content 4 (Our Benefits)</h5>
                               
                                    @php
                                    $content4 = json_decode($page_content->content4);
                                    @endphp
                                   
                                    <div class="form-group">
                                          <label for=""></label>
                                          <select class="form-control" name="content4_display" id="">
                                            <option value="true" {{$content4->content4_display=='true'?'selected=selected':''}}>Active</option>
                                            <option value="false" {{$content4->content4_display=='false'?'selected=selected':''}}>In Active</option>
                                          </select>
                                    </div>
                               
                                <div class="form-group">
                                    <label for="my-input">Heading</label>
                                    <input id="my-input" class="form-control" name="content4_heading" type="text" value="{{!empty($content4->content4_heading)?$content4->content4_heading:''}}" />
                                </div>
                                <div class="form-group">
                                    <label for="my-input">text</label>
                                    <textarea id="my-input" class="form-control" type="text" name="content4_text"  cols="30" rows="5">{{!empty($content4->content4_text)?$content4->content4_text:''}}</textarea>
                                </div>
                            </div>
                                
                            <div class="col-4">
                                <h5>Section 1</h5>
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" name="content4_section1_heading" type="text" value="{{!empty($content4->content4_section1_heading)?$content4->content4_section1_heading:''}}" />
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content4_section1_text"  cols="30" rows="5">{{!empty($content4->content4_section1_text)?$content4->content4_section1_text:''}}</textarea>
                            </div>
                            </div>
                            <div class="col-4">
                                <h5>Section 2</h5>
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" name="content4_section2_heading" type="text" value="{{!empty($content4->content4_section2_heading)?$content4->content4_section2_heading:''}}" />
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content4_section2_text"  cols="30" rows="5">{{!empty($content4->content4_section2_text)?$content4->content4_section2_text:''}}</textarea>
                            </div>
                            </div>
                            <div class="col-4">
                                <h5>Section 3</h5>
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" name="content4_section3_heading" type="text" value="{{!empty($content4->content4_section3_heading)?$content4->content4_section3_heading:''}}" />
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content4_section3_text"  cols="30" rows="5">{{!empty($content4->content4_section3_text)?$content4->content4_section3_text:''}}</textarea>
                            </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-success" id="content4_submit">Update</button>
                                </div>
                            </div>
                        
                </div>
                </div>
               </div>
            </form>
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form action="{{url('manage-page')}}" method="post" id="content5" enctype="multipart/form-data">
                            @csrf
                            <h5>Content 5 (Quick Software Overview)</h5>
                                @php
                                   $content5 = json_decode($page_content->content5);
                                @endphp
                                
                                <div class="form-group">
                                          <label for=""></label>
                                          <select class="form-control" name="content5_display" id="">
                                            <option value="true" {{$content5->content5_display=='true'?'selected=selected':''}}>Active</option>
                                            <option value="false" {{$content5->content5_display=='false'?'selected=selected':''}}>In Active</option>
                                          </select>
                                </div>
                           
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content5->content5_heading)?$content5->content5_heading:''}}" name="content5_heading"/>
                            </div>
                            <div class="form-group">
                                <label for="my-input">text</label>
                                <textarea id="my-input" class="form-control" type="text" name="content5_text"  cols="30" rows="5">{{!empty($content5->content5_text)?$content5->content5_text:''}}</textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="my-input">Upload Image</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file" >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($content5->file))
                                 <div class="col-2 ml-4 ">
                                    <img style="width:113px;height:84px"  src="{{asset('public/assets/page-content')}}/{{$content5->file}}" alt="no image">
                                 </div>
                                @endif
                            </div> --}}
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="content5-submit">Update</button>
                            </div>
                        </form>
                        
                          <form action="" method="post" id="content7" enctype="multipart/form-data">
                                @csrf
                                <h5>Content 7 (Pricing)</h5>
                               
                                    @php
                                    $content7 = json_decode($page_content->content7);
                                    @endphp
                                   
                                    <div class="form-group">
                                          <label for=""></label>
                                          <select class="form-control" name="content7_display" id="">
                                            <option value="true" {{$content7->content7_display=='true'?'selected=selected':''}}>Active</option>
                                            <option value="false" {{$content7->content7_display=='false'?'selected=selected':''}}>In Active</option>
                                         </select>
                                    </div>
                                    
                               
                                <div class="form-group">
                                    <label for="my-input">Heading</label>
                                    <input id="my-input" class="form-control" type="text" value="{{!empty($content7->content7_heading)?$content7->content7_heading:''}}" name="content7_heading"/>
                                </div>
                                <div class="form-group">
                                    <label for="my-input">text</label>
                                    <textarea id="my-input" class="form-control" type="text" name="content7_text"  cols="30" rows="5">{{!empty($content7->content7_text)?$content7->content7_text:''}}</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-success" id="content7_submit">Update</button>
                                </div>
                          </form>
                        
                    </div>
                    <div class="col-6">
                        <form action="" method="post" id="content6" enctype="multipart/form-data">
                            @csrf
                            <h5>Content 6 </h5>
                                @php
                                   $content6 = json_decode($page_content->content6);
                                @endphp
                               
                                   <div class="form-group">
                                          <label for=""></label>
                                          <select class="form-control" name="content6_display" id="">
                                            <option value="true" {{$content6->content6_display=='true'?'selected=selected':''}}>Active</option>
                                            <option value="false" {{$content6->content6_display=='false'?'selected=selected':''}}>In Active</option>
                                         </select>
                                    </div>
                            
                            <div class="form-group">
                                <label for="my-input">Heading</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content6->content6_heading)?$content6->content6_heading:''}}" name="content6_heading"/>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Question 1</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content6->content6_question1)?$content6->content6_question1:''}}" name="content6_question1"/>
                                <label for="my-input">Answer</label>
                                <textarea id="my-input" class="form-control" type="text" cols="30" rows="2" name="content6_answer1">{{!empty($content6->content6_answer1)?$content6->content6_answer1:''}} </textarea>
                           
                            </div>
                            <div class="form-group">
                                <label for="my-input">Question 2</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content6->content6_question2)?$content6->content6_question2:''}}" name="content6_question2"/>
                                <label for="my-input">Answer</label>
                                <textarea id="my-input" class="form-control" type="text"  cols="30" rows="2" name="content6_answer2"> {{!empty($content6->content6_answer2)?$content6->content6_answer2:''}}</textarea>
                           
                            </div>
                            <div class="form-group">
                                <label for="my-input">Question 3</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content6->content6_question3)?$content6->content6_question3:''}}" name="content6_question3"/>
                                <label for="my-input">Answer</label>
                                <textarea id="my-input" class="form-control" type="text" cols="30" rows="2"  name="content6_answer3">{{!empty($content6->content6_answer3)?$content6->content6_answer3:''}} </textarea>
                           
                            </div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-success" id="content6-submit">Update</button>
                            </div>
                        </form>
                     </div>
                     
                </div>
                 </div>
                  </div>
                <form action="{{url('manage-page')}}" method="post" id="content_8">
                    @csrf
                 <div class="card">
                <div class="card-body">
                    <div class="row">
                      
                        @php
                          $content8 = json_decode($page_content->content8);
                        @endphp
                        <div class="col-8">
                            <h5>Content 8 </h5>
                            <div class="form-group">
                                <label for="my-input">Video Url</label>
                                <input id="my-input" class="form-control" type="text" value="{{!empty($content8->content8_vedio_url)?$content8->content8_vedio_url:''}}" name="content8_vedio_url"/>
                            </div>
                            {{-- <iframe width="420" height="315"
                                src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe>  --}}
                            <iframe width="420" height="315" src="https://www.youtube.com/embed/owhuBrGIOsE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <input type="checkbox" hidden checked value="true" name="content8_display" />
                            <input type="hidden" name="image" value="{{!empty($content8->file)?$content8->file:''}}">
                            <div class="form-group">
                                <label for="my-input">Upload Image</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file" >
                            </div>
                            <div class="row mb-4">
                                @if(!empty($content8->file))
                                 <div class="col-2 ml-4 ">
                                    <img style="width:113px;height:84px"  src="{{asset('public/assets/page-content')}}/{{$content8->file}}" alt="no image">
                                 </div>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" id="content8-submit">Update</button>
                            </div>
                        </div>
                    </div>
                   </div>
                     </div>
                </form>
               
                {{-- <div class="form-group text-center" style="margin-top: 24px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form> --}}
           
    </div>
</div>
<script src="{{asset('assets/admin/js/user-dashboard/manage_page.js')}}"></script>
@endsection