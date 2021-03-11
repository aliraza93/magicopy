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
            /*height: 78px;*/
            border-bottom: 1px solid rgb(220, 220, 220);
            background-color: rgb(240, 242, 245);
            font-family: Helvetica, Open Sans;
            font-size: 1rem;
            color: rgb(101, 103, 107);
        }
 
    </style>
    @foreach($ads['choices'] as $value)
        
    
    <div class="sc-XhUPp kiNLFp">
        <div style="cursor: pointer; position: relative;">
            <!--<div class="companyInfoContainer">-->
            <!--    {{-- <img src="{{asset('assets')}}/admin/images/ads/megamenu-bg.png" alt="Copysmith Logo"-->
            <!--        style="width: 40px; border-radius: 50%; border: 1px solid rgb(230, 230, 230);"> --}}-->
            <!--    <div class="sc-hkwnrn jOcitS">-->
            <!--        <div style="color: rgb(8, 8, 8); font-size: 0.9125rem;"><b>{{$ads['company_name']}}</b></div>-->
                 
            <!--    </div>-->
            <!--</div>-->
            <div style="margin-top:1.175rem; color: rgb(5, 5, 5);">
                <div id="mainContent" style="font-size: 0.925rem;font-family:helvetica;">{{$value['text']}}.</div>
            </div>
          
    </div>
     </div>
    @endforeach
</div>
