<?php

namespace App\Models;
use Carbon\Carbon;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TeshuBrand extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'teshu_brands';
    protected $guarded = [];

    public static function getTimingHistorys($time)
            {
               $i=0;
               $date_count = array();
               while ( $i<$time)
               {
               	$data = TeshuBrand::where('is_get',1)
                    ->where('updated_at', '<', $i > 0 ? Carbon::today()->subDays($i-1) :  Carbon::now())
                    ->where('updated_at', '>',Carbon::today()->subDays($i))->get()
                    ->count();
                    $i=$i+1;
                    $date_count[]=$data;
               }

                return $date_count;
            }
            //获取7天日期
            public static function get_dates($time)
            {
               $i=0;
               $date_count=[];
               $year_count=[];
               while ( $i<$time)
               {
               	$date =Carbon::today()->subDays($i)->format('d');
                    $i=$i+1;
                    $date_count[]=$date;
               }

                return $date_count;
            }
            //获取指定日期数量
            public static function getdays($time)
            {
               	$data = TeshuBrand::where('is_get',1)->whereBetween('updated_at',[
               		Carbon::today()->subDays($time),
               		$time > 0 ? Carbon::today()->subDays($time-1):Carbon::now()])->where('state',1)
               	   ->get()->count();
                return $data;
            }
          //获取每个用户指定日期完成数量
             public static function users_brand($time,$user_id)
            {
               	$data = TeshuBrand::where('is_get',1)->whereBetween('updated_at',[
               		Carbon::today()->subDays($time),
               		$time > 0 ? Carbon::today()->subDays($time-1):Carbon::now()])
               	 	->where('brand_userid',$user_id)->where('state',1)
               	   ->get()->count();
                return $data;
            }
            //获取每个用户指定日期领取数量
            public static function users_getbrand($time,$user_id)
            {
                $data = TeshuBrand::where('is_get',1)->whereBetween('updated_at',[
                    Carbon::today()->subDays($time),
                    $time > 0 ? Carbon::today()->subDays($time-1):Carbon::now()])
                    ->where('brand_userid',$user_id)->where('is_get',1)
                    ->get()->count();
                return $data;
            }
             public static function getusers($time,$hanshu)
            {
            	$data=[];
               	$users = TeshuBrand::wherenotin('brand_userid',[1])->pluck('brand_username', 'brand_userid');
               	foreach ($users as $key => $value) {
               		if(!empty($value))
               			$data[]=$value.':'.TeshuBrand::$hanshu($time,$key);

               	}
                return $data;
            }

             public static function strusers($time)
            {
            	$data='';
               	$users = TeshuBrand::whereNotIn('brand_userid',[1])->pluck('brand_username', 'brand_userid');
               	foreach ($users as $key => $value) {
               		if(!empty($value))
               			$data.=$value.':'.TeshuBrand::users_brand($time,$key).'&nbsp;&nbsp;&nbsp;&nbsp;';

               	}
                return $data;
            }




  public static function getxingqi($time)
 {
 				$a=Carbon::today()->subDays($time)->dayOfWeek;
                if($a==0)
                    $day='星期日';
                elseif ($a==1)
                    $day='星期一';
                elseif ($a==2)
                    $day='星期二';
                elseif ($a==3)
                   $day='星期三';
                elseif ($a==4)
                    $day='星期四';
                elseif ($a==5)
                    $day='星期五';
                elseif ($a==6)
                   $day='星期六';
                return  $day;


 }


}
