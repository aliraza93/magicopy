<div>
    <style>
        .kiNLFp {
            padding: 10px;
            background-color: white;
            border: 1px solid rgb(132, 141, 211);
            width: 100%;
            border-radius: 10px;
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
            border-bottom: 1px solid rgb(220, 220, 220);
            background-color: rgb(240, 242, 245);
            font-family: Helvetica, Open Sans;
            font-size: 1rem;
            color: rgb(101, 103, 107);
        }
    </style>
    @foreach($ads['choices'] as $value)
    <div class="response-content-{{$value['id']}} sc-XhUPp kiNLFp">
        <div style="cursor: pointer; position: relative;">
            <div class="companyInfoContainer">
                <div class="sc-hkwnrn jOcitS">
                </div>
            </div>
            <div style="color: rgb(5, 5, 5);">
                <div id="mainContent" style="font-size: 0.925rem;">
                    <div class="text-options">
                        <span class="top-icons copy-icon"><i class="fas fa-copy"></i></span>
                        <span class="top-icons delete-icon" data-id="{{ $value['id'] }}"><i class="fas fa-trash-alt"></i></span>
                    </div>
                    <div class="my-text">{{ $value['description'] }}.</div>
                </div>
            </div>
        </div>
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
