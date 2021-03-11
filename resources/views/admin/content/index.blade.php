@extends('layouts/mainAdmin')
@section('content')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-pane");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    @php
        $currentUser = App\Models\User::where('id', $user['userID'])->first();
    @endphp
    {{-- project dorpdown --}}
    <div class="proj-dropdown sidemenu-opend dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Projects<i class="fas fa-chevron-down"></i>
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
	<div class="row">
        <div class="col-lg-12">
            <div class="content-tabing" id="tabs" >
                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" id="stars" class="btn btn-default tablinks active" onclick="openCity(event, 'tab1')" data-toggle="tab">
                            <i class="fab fa-stack-exchange"></i>
                            <div class="hidden-xs">All content {{ $total_contents }} </div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="favorites" class="btn btn-default tablinks" onclick="openCity(event, 'tab2')" data-toggle="tab">
                            <i class="fas fa-star"></i>
                            <div class="hidden-xs">Favorites</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="following" class="btn btn-default tablinks" onclick="openCity(event, 'tab3')" data-toggle="tab">
                            <i class="fas fa-trash-alt"></i>
                            <div class="hidden-xs">Trash</div>
                        </button>
                    </div>
                </div>
                <div class="well">
                    <div class="tab-content">
                    </div>
                </div>
            </div>
        </div>
	</div>
    
    <div class="tab-pane fade in show" id="tab1">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right"></div>
                <h4 class="page-title">All Contents</h4>
            </div>
        </div>
        <div class="contentdiv">

        </div>
    </div>

    <div class="tab-pane fade in show" style="display: none;" id="tab2">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right"></div>
                <h4 class="page-title">This is tab 2</h4>
            </div>
        </div>
    </div>
    <div class="tab-pane fade in show" style="display: none;" id="tab3">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right"></div>
                <h4 class="page-title">This is tab 3</h4>
            </div>
        </div>
    </div>

	{{-- <div class="bg-light">
		<section class="" >
	        <div class="grid-box">
	            <div class="container sml-container">
	                <div class="row g-3">
	                    @foreach($contents as $content)
	                    	<div class="col-lg-4 col-md-6 content-card">
		                        <a href="#" data-toggle="modal" data-target="#content-details" onclick="showContent({{ $content->id }})">
		                        	<div class="grid-box-item">
			                            <p>{{ ucfirst($content->ads->ads_category) }}</p>
			                            <h5>{{ mb_strimwidth($content->description, 0, 100, "...") }}</h5>
			                        </div>
		                        </a>
		                    </div>
	                    @endforeach
	                    <div class="col-lg-12">
	                        <div class="page-options">
	                            <p>&nbsp;</p>
	                            {{ $contents->render() }}
	                        </div>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </section>
    </div> --}}

    <!-- Content Details Modal -->
    <div class="modal fade" id="content-details" tabindex="-1" role="dialog" aria-labelledby="loginModel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="" class="url">
                	<h5 class="modal-title"></h5>
                </a>
                <div class="text-right popup-options">
                	<a href="#"><i class="fa fa-copy" aria-hidden="true"></i></a>
                	<a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                	<a href=""><i class="fas fa-share-alt"></i></a>
                	<a href=""><i class="fas fa-star"></i></a>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="account-pages mt-1 mb-1">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="card bg-pattern mb-0" style="width: 100%;">
                                <div class="card-body p-0">
                                    <div class="form-group mb-0">
                                        <a href="#" class="show-input"><i class="fas fa-eye"></i>  Show Input</a>
                                    	<input type="hidden" name="ads_response_id" id="ads_response_id">
                                        {{-- <span class="content-description" id="email_error"></span>
                                        <span class="content-description" id="email_error"></span> --}}
                                        <textarea class="content-description" id="email_error" rows="3"></textarea>
                                        {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                    </div>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end page -->
            </div>
            <div class="modal-footer">
                <span class="time">1 day ago</span>
                <button class="btn btn-danger" id="create-project">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	function showContent(ads_response_id) {
    		$.ajax({
                url: "{{ url('get-content-details') }}"+"/"+ads_response_id,
                method:"get",
                cache: false,
                success: function(result){
                    if(result.status == true) {
                        $(".modal-title").text(result.data.ads.ads_category.charAt(0).toUpperCase() + result.data.ads.ads_category.slice(1));
                      	$(".content-description").html(result.data.content.description);
                      	$("#ads_response_id").val(result.data.content.id);
                      	$(".url").attr("href", result.data.url);
                        $(".show-input").attr("href", result.data.input_url);
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
    	$( document ).ready(function() {
    		getallContent();
    	});
    </script>
@endsection