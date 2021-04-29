@foreach($data as $k)
<span class="zsy">{{$k}}</span>
@endforeach
<p></p>
<span class="zsy">今天：发布-{{App\Models\TeshuBrand::getdays(0)}}&nbsp;&nbsp;&nbsp;&nbsp;  领取-{{App\Models\TeshuBrand::getTimingHistorys(1)[0]}}</span>
<p></p>
<span class="zsy">昨天：发布-{{App\Models\TeshuBrand::getdays(1)}}&nbsp;&nbsp;&nbsp;&nbsp;  领取-{{App\Models\TeshuBrand::getTimingHistorys(2)[1]}}</span>


<!-- {{App\Models\TeshuBrand::users_brand(0,8)}} -->


<style>
     .zsy{
        font-size: 10;
        padding-top: 5px;
        padding-left: 10px;
        background: none !important;
        /*color: #a8a9bb !important;*/
    }
    .card-box-title{font-weight:bold; }
    
</style>