<?php

namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use  App\Models\AnxjmPaizi;
use  App\Models\Brand;

class QuchongController extends Controller
{
    public function index()
    {
        // 获取要处理的数据
        //$brands=Brand::whereNull('web_id');
        $a=10600;
        $b=247472-$a;
        $brands = Brand::where('id','<',$b)->where('id','>',$a);
        $i=1;
        if($brands->count()>0)
        {
            $brands=$brands->get();
            foreach ($brands as $item)
            {
                $brandname=$item->brandname;
                $num=AnxjmPaizi::where('brand','like','%'.$brandname.'%')->count();
                if($num>0)
                {
                    $item->web_id=0;
                }
                else
                {
                    $item->web_id=1;
                }
                $i=$i+1;
                if($i%1000==0)
                    sleep(10);
            }
            return '去重成功'.$i;

        }
        else
        {
            return '没有重复的！';
        }


    }
}
