<?php

namespace App\Models;
use Dcat\Admin\Admin;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
class Liuchengku extends Model
{
	use HasDateTimeFormatter;
    //protected $table = 'anxjm_paizis';
    //没有指定的话，默认使用 mysql
    //protected $connection = 'mysql_02';
    protected $table = 'jmlcs';
	//protected $fillable = ['userid','ismake'];
    protected $guarded = [];
	//public $timestamps = false;
	public static function gettypesall($table,$type)
    {
        $options = \DB::table($table)->select($type)->distinct()->get();
        $selectOption = [];
        foreach ($options as $option){
            $selectOption[trim($option->$type)]=trim($option->$type);
        }
        return $selectOption;
    }
	public static function get_user($table,$user_id)
    {
        $options = \DB::table($table)->select($user_id)->distinct()->get();
        $selectOption = [];
        foreach ($options as $option){
			$user_name=Admin::user()->where('id',$option->$user_id)->value('name');
            $selectOption[$option->$user_id]=trim($user_name);
        }
        return $selectOption;
    }

	public static function cutstr_html($string,$str)
   {
    //$string=htmlspecialchars_decode($string, ENT_QUOTES);
	$string=html_entity_decode($string, ENT_QUOTES, "utf-8");
	$string=str_replace($str,'{}',$string);
	$string=str_replace(array('</p>','</P>','< /p>','< /P>','</div>','< /div>','<br>','</br>','<br/>','</span>','< /span>'),'@@',$string);
    $string = strip_tags($string);
	$string = preg_replace ('/\n/is', '@@', $string);
	$string = preg_replace ('/\n\r/is', '@@', $string);
    $string = preg_replace ('/\n/is', '', $string);
	$string = preg_replace ('/\s+/is', '', $string);
    $string = preg_replace ('/ |　/is', '', $string);
    $string = preg_replace ('/&nbsp;/is', '', $string);
	$string=str_replace(array(" ","　","       ","   ","\n","\r","\t"),'',$string);
	$string=str_replace(array('\n\r','\n'),'@@',$string);
	//$string=str_replace('&nbsp;','',$string);
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);
    //if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen))."…";
    //else $string = join('', array_slice($t_string[0], 0, $sublen));//参数$sublen
	$string=str_replace(array('{}加盟流程：@@','{}加盟流程:@@:','{}加盟流程@@','加盟流程：@@','智慧之选者','智慧之选','加盟流程:',' ','    '),'',$string);
	$string=str_replace(array('@@ '),'@@',$string);
	$string=str_replace('本项目投资金额、加盟店数量、招商加盟地区和经营模式','{}加盟流程、投资金额、加盟店数量以及招商加盟地区和经营模式',$string);
	$string=str_replace('并及时获得加盟项目较新动态','并及时获得{}加盟项目的较新动态',$string);
	$string=str_replace('前景加盟网','安心加盟网',$string);
	$string = preg_replace ('/@{3,}/', '@@', $string);
	$string=trim($string, "@@");
	$string=trim($string, "{}");
    return $string;
   }
    public static function pp_html($string)
    {
        $string=str_replace('@@','</p><p>',$string);
        return  '<p>'.$string.'</p>';
    }


}
