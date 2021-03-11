@extends('layouts/mainAdmin')
@section('content')
<style>
.vardUsers{
   
    border-color: #43bfe5;
    box-shadow: 1px 2px 15px -5px #000000b3;
}
</style>
<div class="row mt-3">
      
                  
                 
                            <div class="col-md-4 ">
                                <a href="{{ url('trail-user') }}" >
                                <div class="widget-rounded-circle card-box bg-info vardUsers">
                                    <div class="row">
                                        <!--</div>-->
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h3 class="mt-1 ml-1 text-white"><span data-plugin="counterup">{{!empty($trail_user)?$trail_user:0}}</span></h3>
                                                <p class="text-white mb-1 text-truncate">Users on Trial</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->

                            <div class="col-md-4 ">
                                 <a href="{{ url('subscribe-user') }}">
                                <div class="widget-rounded-circle card-box bg-success vardUsers">
                                    <div class="row">
                                        
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h3 class="text-white mt-1"><span data-plugin="counterup">{{!empty($subscribe_user)?$subscribe_user:0}}</span></h3>
                                                <p class="text-white mb-1 text-truncate">Subscribe Users</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                              </a>
                            </div> <!-- end col-->

                         

                            <div class="col-md-4 ">
                                 <a href="{{ url('cancelled-user') }}"> 
                                <div class="widget-rounded-circle card-box bg-danger vardUsers">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h3 class="text-white mt-1"><span data-plugin="counterup">{{!empty($cancelled_user)?$cancelled_user:0}}</span></h3>
                                                <p class="text-white mb-1 text-truncate">Cancelled Users</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                               </a>
                            </div> <!-- end col-->
                            
                        </div>
<div class="row" style="margin-top:3%">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Users</h4>
                <p class="text-muted font-13 mb-4">
                    {{-- The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                    that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                --}}
                </p> 
                <div class="mg-b-25 mg-l-10">
                   <a href="{{ url('trail-user') }}" class="btn btn-info">Users on Tiral</a>
                   <a href="{{ url('subscribe-user') }}" class="btn btn-success"> Subscribed Users</a>
                   <a href="{{ url('cancelled-user') }}" class="btn btn-danger"> Cancelled User</a>

                </div>
                {{-- <div class="row mg-b-25 mg-l-10">
                    <a href="{{url('/orders')."/new" }}" class="btn btn-info">
                        <div class="col-lg-4">
                        Trial User
                      </div>
                   </a>
                
                    <a href="{{ url('/orders')."/accepted" }}" class="btn btn-secondary">
                    <div class="col-lg-4">
                     Subscribe User
                    </div>
                
                   </a>
                  
                  <a href="{{ url('/orders')."/completed" }}" class="btn btn-danger">
                  <div class="col-lg-4">
                      Cancelled User
                    </div>
                  </a>
                </div> --}}
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ip Adress</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Plan period start</th>     
                            <th>Plan period end</th>          
                            <th>Action</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach($users as $value)
                     
                        <tr>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->ip_address}}</td>
                            <td>{{$value->country_name}}</td>
                            <td>{{!empty($value->subscription_status)?$value->subscription_status:'Trail'}}</td>
                            <td>{{!empty($value->plan_period_start)?$value->plan_period_start:'N/A'}}</td>
                            <td>{{!empty($value->plan_period_end)?$value->plan_period_end:'N/A'}}</td>
                            @if($value->status !='3')
                            <td><a class="btn btn-danger" href="{{url('user/update/'.encrypt($value->user_id).'/'.encrypt(3).'')}}" style="color:white">Block</a> </td>
                            @else                            
                             <td><a class="btn btn-primary" href="{{url('user/update/'.encrypt($value->user_id).'/'.encrypt(1).'')}}" style="color:white">Active</a> </td>
                            @endif
                        </tr>
                        @endforeach
                       
                       
                    </tbody>
                </table>
                {{$users->links()}}
                
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->


<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script>
 


$(document).on('click','#submit_btn',function(e){
    $("#submit_btn").hide();
    $('.plz_wait').fadeIn();
    $url = "{{url('google-ad')}}";
    $.ajax({
      url: $url,
      type: "POST",
      dataType: 'json',
      data: $('#add_form').serializeArray(),
      success: function (data) {
        if(data.response){
          var redirect = base_url + "claimtax3";
          window.location.replace(redirect);
        }
        else{
          $('.plz_wait').hide();
          $("#submit_btn").fadeIn();
          $('#last_name_error').html(data.last_name_error);
         
        }
      }
    });
});
</script>

@endsection
