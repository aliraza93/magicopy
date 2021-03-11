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
                <h2 style="text-align:center;margin-right: 69px;color: #fe5c5a;">Pakage Pricing</h2>

                    <form action="pricing" method="post">
                        @csrf
                    <div class="col-12">
                       
                        <div class="form-group">
                              <label for="">Duration</label>
                              <select class="form-control" name="duration" id="duration">
                                <option value="month" {{$pakage->duration=='year'?'selected=selected':''}}>month</option>
                                 <option value="year" {{$pakage->duration=='year'?'selected=selected':''}}>year</option>
                                
                              </select>
                            @error('duration')
                               <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                          <div class="form-group">
                            <label for="my-input">Discount (%)</label>
                            <input  class="form-control" value="{{!empty($pakage->discount)?$pakage->discount:''}}" max="99" type="number" id="discount" name="discount">
                           
                        </div>
                        <div class="form-group">
                            <label for="my-input">Price</label>
                            <input id="pricing" class="form-control" value="{{!empty($pakage->price)?$pakage->price:''}}" type="text" name="price">
                            @error('price')
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
