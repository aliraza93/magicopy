<div>
    <style>
        .kiNLFp {
            padding: 20px;
            background-color: white;
            border: 1px solid rgb(132, 141, 211);
            width: 100%;
            border-radius: 10px;
            /* margin-top: 20px; */
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
            /* position: relative; */
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
            /* height: 78px; */
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
                <div class="text-options">
                    <span class="top-icons copy-icon"><i class="fas fa-copy"></i></span>
                    <span class="top-icons delete-icon" data-id="{{$value['id']}}"><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="companyInfoContainer">
                    <div class="sc-hkwnrn jOcitS">
                        <div style="color: rgb(8, 8, 8); font-size: 0.9125rem;"><b>{{$ads['company_name']}}</b></div>
                        <div style="color: rgb(101, 103, 107); font-size: 0.85rem;">Sponsored · 
                            <img src="https://i.imgur.com/hDk78b9.png" alt="Earth Icon" style="width: 12px; margin-top: -2px;">
                        </div>
                    </div>
                </div>
                <div style="margin-top:1.175rem; color: rgb(5, 5, 5);"> </div>
                <div class="sc-jvfriV kxdBff">
                    <div style="font-size: 0.7625rem;">{{$ads['company_name']}}.com</div>
                    <div id="mainContent" style="font-size: 0.925rem;width: 72%;font-weight: 700;">
                        <p class="my-text">{{ $value['description'] }}...</p>
                    </div>
                    <div id="Headline" style="color: rgb(5, 5, 5); font-weight: 600; width: 360px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> </div>
                    <div style="position: absolute; color: rgb(5, 5, 5); font-size: 0.9rem; font-weight: 600; text-align: center; padding-top: 0.5rem; top: 20px; right: 18px; width: 100px; height: 38px; border-radius: 6px; background: rgb(228, 230, 235) none repeat scroll 0% 0%;">
                        Shop Now
                    </div>
                </div>
                <div class="">
                    <img src="{{asset('assets/admin/facebook_ad.jpeg')}}" alt="Paper airplane illustration" style="width: 100%;">
                </div>
            </div>
            <hr style="width: calc(100% + 8px); margin-left: -4px;">
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
