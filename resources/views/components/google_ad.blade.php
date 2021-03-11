<div>
    <style>
        .kajamm {
            background-color: white;
            width: 100%;
            padding: 20px;
            border-radius: 7px;
            user-select: none;
            margin-bottom: 20px;
        }
        .kypFeC {
            margin: 0px;
            font-size: 14px;
            color: rgb(33, 37, 41);
        }
        .gdARiY {
            color: rgb(28, 27, 168);
            font-size: 1.125rem;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
    </style>
    @foreach($ads['choices'] as $value)        
   
    <div title="Relaxation Without The Cost" class="response-content-{{$value['id']}} sc-citwmv kajamm">
        <div class="text-options">
            <span class="top-icons copy-icon"><i class="fas fa-copy"></i></span>
            <span class="top-icons delete-icon" data-id="{{$value['id']}}"><i class="fas fa-trash-alt"></i></span>
        </div>
        <p class="sc-jcVebW kypFeC"><b>Ad</b> • www.{{$ads['company_name']}}.com/ ▾<br>
            <div class="sc-iBaPrD gdARiY">{{$ads['company_name']}}</div>
            <p class="my-text">{{ $value['description'] }}...</p>
        </p>
    </div>
    @endforeach
</div>
<script>
    $('.copy-icon').each(function() {
        $(this).click(function() {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(this).parent().parent().children('.my-text').text()).select();
            document.execCommand("copy");
            $temp.remove();
        });
    });
    $('.delete-icon').each(function() {
        $(this).click(function() {
            var response_id = $(this).attr('data-id');
            $.ajax({
                url: "{{ url('delete-response') }}/"+response_id,
                method:"get",
                cache: false,
                success: function(result){
                    if(result.status == true) {
                        deleteAjaxCallBack(response_id);
                    }
                }
            });
        });
    });
</script>