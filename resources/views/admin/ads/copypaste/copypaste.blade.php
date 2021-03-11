<div>
    <style>
        .cmuvkJ {
            border-radius: 15px;
            border: 2px solid rgb(132, 141, 211);
            margin: 20px;
            display: inline-block;
            position: relative;
            cursor: pointer;
            width: 248px;
            height: 176px;
        }
        .esbyIi {
            position: absolute;
            left: 50%;
            display: inline-block;
            top: 50%;
            transform: translate(-50%, -50%);
            color: rgb(83, 92, 165);
            text-align: center;
            width: 100%;
        }
    </style> 
    <form class="form-inline d-flex mt-3" action="template" method="POST" id="Ad_searchForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="template" value="copy-paste">
         <input class="form-control" style="width: 40% !important;" name="search" type="text" placeholder="Search Your Ad's" id="menu1" >
         <button class="btn btn-outline-danger " type="submit">Search</button>
    </form>
    @if($adscounter >0 && empty($user['subscription']['status']) || !empty($user['subscription']['status']) && $user['subscription']['status']=='active')
        <a href="{{url('copypaste')}}">
            <div class="sc-iWFSnp cmuvkJ" style="float: left;">
                <div class="sc-dRPiIx esbyIi">
                    <div style="font-size: 45px;">+</div>
                    <div>New Content Improver</div>
                </div>
            </div>
       </a>
    
  @endif
  <div id="ADS">
   @foreach($adsinfo as $value)
    <a href="{{url('update/copypaste-ad/'.$value['company_name'].'/'.encrypt($value['id']).'')}}">
        <div class="sc-iWFSnp cmuvkJ">
            <div class="sc-dRPiIx esbyIi">
                <div style="font-size: 26px;">{{$value['company_name']}}</div>
                <div style="bottom: 10px; left: 20px;">{{ date('Y-m-d ',strtotime($value['created_at']))}}</div>
            </div>
              <div class="text-right mt-2 mr-2">
                <a class="remove-ad" data-id="{{encrypt($value['id'])}}"> <i class="fas fa-trash"></i> </a>

            </div>
        </div>
    </a>
   @endforeach
   </div>
</div>
<script>
    
 $("#Ad_searchForm").unbind('submit').bind('submit', function() {
    var form = $(this);
    var url = form.attr('action');
    var type = form.attr('method');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (data) {
        if(data.response){
            $('.templatediv').html(data.page);
            // $('#ADS').html(success);
        }
        else{

        }
      }
    });
    return false;
});
$( ".remove-ad" ).on( "click", function() {
 
   id = $(this).attr('data-id');
     $.ajax({
        url: "{{url('remove-ad')}}",
        type: 'POST',
        data: {ad_id:id,_token:"{{csrf_token()}}"},
        dataType: 'json',
        success: function (data) {
        if(data.response){
                $.ajax({
        url: "{{url('template')}}",
        type: 'POST',
        data: {template:'copy-paste',_token:"{{csrf_token()}}"},
        dataType: 'json',
        success: function (data) {
        if(data.response){
             $('.templatediv').html(data.page);
            swal({
                title: "Congratulation",
                text: "Delete Successfully",
                icon: "success",
                buttons: false,
                // dangerMode: true,
            })
        }
        else{

        }
      }
    });
           
        }
        else{

        }
      }
    });
});
</script>

