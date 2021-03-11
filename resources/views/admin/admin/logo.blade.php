@extends('layouts/mainAdmin')
@section('content')
<style>
    .col-6,.col-4 {
        border: 1px solid;
    }
    .logo_div{
         width:50%;
         margin: auto;"
    }
    @media screen and (max-width: 992px) {
      .logo_div{
       width:100%;
      }
    }
</style>
<div class="row logo_div">
    <div class="col-12">
        <div class="card" style="margin-top: 30px;">
            <div class="card-body">
                
                <h2 style="text-align:center;margin-right: 69px;color: #fe5c5a;">Upload MegiCopy Logo</h2>
                   @if(session('message'))
                   <div class="alert alert-success">{{session('message')}}</div>
                   @endif
                    <form action="{{url('logo/create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-12">
                        <div class="form-group">
                                <label for="my-input">Upload Logo</label>
                                <input id="my-input" class="form-control-file btn btn-danger" type="file" name="file"  required>
                              @error('price')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                         </div>
                         <div class="row mb-4">
                                @if(!empty($logo->file))
                                
                              
                                    <img style="    
                                    width: 94%;
    object-fit: contain;
    border-radius: 15px;
    box-shadow: 1px 2px 15px -5px #000000b3;
    background: white;
    margin: 20px;
    display: inline-block;
    position: relative;" src="{{asset('public/assets/page-content')}}/{{$logo->file}}" alt="no image">
                               
                                
                                @endif
                         </div>
                         <div class="form-group" style="text-align: center;margin-top: 24px;">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>



@endsection
