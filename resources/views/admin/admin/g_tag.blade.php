@extends('layouts/mainAdmin')
@section('content')
<style>
    .col-6,.col-4 {
        border: 1px solid;
    }
</style>
<div class="row" style="width: 50%;margin: auto;">
    <div class="col-12">
        <div class="card" style="margin-top: 30px;">
            <div class="card-body">
                @if(session('message'))
                 <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <h2 style="text-align:center;margin-right: 69px;color: #fe5c5a;">Google tag</h2>

                    <form action="g-tag" method="post">
                        @csrf
                    <div class="col-12">
                       <input type="hidden" value="{{!empty($tag->id)?$tag->id:''}}" name="id">
                        <div class="form-group">
                              <label for="">Tag</label>
                               <textarea  class="form-control"  type="number" id="text" name="text">{{!empty($tag->text)?$tag->text:''}}</textarea>
                            @error('text')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
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

<script>

    
    data_fetch();
    function data_fetch(){
         duration = $('#duration').val();
          $.ajax({
          url: 'fetch_price',
          type: "POST",
          dataType: 'json',
          data: {'duration':duration,
              "_token": "{{ csrf_token() }}",
          },
          success: function (data) {
              $('#discount').val(data.discount);
              $('#pricing').val(data.price);
            
          }
     })
    }
   
     $('#duration').on('change', function() { 
           data_fetch();
       });
// $('#discount').on('change', function() { 
//     percentage = $('#discount').val();
//   $percantageValue = percentage/100*$totalValue;
//   return round($totalValue-$percantageValue,2);
// })
</script>

@endsection
