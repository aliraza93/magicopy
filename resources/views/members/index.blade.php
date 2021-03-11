@extends('layouts/mainAdmin')
@section('content')
<style>
    .fkyVgZ {
        background-color: #FE6161;
        padding: 10px 40px;
        border: medium none;
        border-radius: 34px;
        box-shadow: rgba(83, 92, 165, 0.2) 0px 1px 2px 2px;
        color: white;
        font-size: 20px;
        margin-top: 30px;
    }
    .btn {
        border-radius: 44px;
    }
    .fa{
        color:#f35d5d;
        font-size: 17px;
        padding: 10px;
        border-radius: 5px;
    }
    .fa:hover{
        color: black;
        padding: 10px;
        background-color: #f3f7f9
    }
  .tooltip-inner {
    background-color: #fb8231;
}

</style>
<!-- Form row -->
<div class="row" style="margin-top: 3%;">
    <div class="col-12">
     @if(session()->has('msg'))
     <div class="alert alert-success">
      {{ session()->get('msg') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<br>
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Team Members</h4>
        <br>
        <div class="row">
            <div class="col-md-6">
                <input type="text" id="myInput" readonly="" name="link" value="{{url('/') }}?ref={{$userR->linkout}}&mbr={{$userR->user_id}}&pa={{$userR->parent_member}}" class="form-control"> 
            </div>
            <div class="col-md-3">
                @if(count($refers)>=10)
                <a href="#" class="btn btn-success" onclick="alert('You can add max 10 members!');">Share Url</a>
                @else
                <a href="#" class="btn btn-success" onclick="share();"><i class="fas fa-copy"></i> Copy Link</a>
                <a href="#" title="The existing link will be deactivated." data-toggle="tooltip" data-placement="top" class="btn btn-light red-tooltip" onclick="reset('{{$userR->user_id}}');"><i class="fas fa-sync-alt"></i> Reset Link</a>
                @endif

            </div>
        </div>

        <br>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Signup at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($refers)>0)
                @foreach($refers as $key=> $ref)
                <tr>
                    <form method="post" action="update/members/{{$ref->user_id}}" id="preview_form">
                        @csrf
                        <td>{{$key+1}}</td>
                        <td>{{$ref->username}}</td>
                        <td>{{$ref->email}}</td>
                        <td>
                            @if($userR->linked_user_role =='user')
                            <span class="badge badge-success">{{$ref->linked_user_role}}</span>
                            @else
                            <select name="linked_user_role" class="form-control" id="user_role" onchange="change_status('{{$ref->user_id}}');">
                                <option value="admin" @if($ref->linked_user_role=='admin') selected @endif)>Admin</option>
                                <option value="user" @if($ref->linked_user_role=='user') selected @endif>User</option>
                            </select>
                            @endif
                        </td>
                        <td>{{$ref->created_at->toFormattedDateString()}}</td>
                        <td>
                            @if($ref->user_id == $userR->user_id)
                            <button class="btn" disabled=""><i class="fa fa-trash"></i></button>

                            @elseif($userR->linked_user_role =='admin' )
                            <a href="#" onclick="removeUser('{{$ref->user_id}}')" class="btn"><i class="fa fa-trash"></i></a>
                            @else
                            --
                            @endif
                        </td>

                    </form>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div> <!-- end card-body -->
</div> <!-- end card-->
</div> <!-- end col -->
</div>
<!-- end row -->

<script type="text/javascript">
    function share(argument) {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
       
        Swal.fire(
                  'Copied!',
                  'Link has been Copied.',
                  'success'
                );
    }



    function removeUser(argument) {
     var txt;
     var r = confirm("Are you sure you want to delete?");
     if (r == true) {

        // alert(argument);
        // return false;
        $.ajax({

            url: 'delete/member/'+argument,
            type: "get",
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,

            beforeSend: function(){

            },
            success: function (data) {

              Swal.fire(
                  'Updated!',
                  'Link has been updated.',
                  'success'
                );
              location.reload();
          },
          error:(function(error) {
              alert("Something went wrong");
          })

      });  
    }
}

function change_status(argument) {
    var user_role=$('#user_role').val();
    var datastring = $("#preview_form").serialize();
    console.log(datastring);
     $.ajax({

            url: 'update/members/'+argument,
            type: "post",
        
             data: datastring,

            beforeSend: function(){

            },
            success: function (data) {
Swal.fire({
  
  icon: 'success',
  title: 'Status Has been updated',
  showConfirmButton: false,
  timer: 1500
})
             
          },
          error:(function(error) {
              alert("Something went wrong");
          })

      });
}

function reset(argument) {
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
      if (result.isConfirmed) {
        

         $.ajax({

            url: 'update/link/'+argument,
            type: "get",
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,

            beforeSend: function(){

            },
            success: function (data) {

              Swal.fire(
                  'Updated!',
                  'Link has been updated.',
                  'success'
                );
              location.reload();
          },
          error:(function(error) {
              alert("Something went wrong");
          })

      });
      }
    })
    

        // alert(argument);
        // return false;
         
    
}
</script>


@endsection