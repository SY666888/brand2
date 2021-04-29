<?php
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use  App\Models\Brand;
use  App\Models\AnxjmPaizi;
use  App\Models\AnxjmBrand;
use App\Models\W51xxspPaizi;
use App\Models\W51xxspBrand;
use Dcat\Admin\Layout\Content;
use App\Admin\Repositories\Brand as  BrandRepositorie ;
class YijianQuchongController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('一键去重！')
            ->description('详情')
            ->body($this->yijianquchong() );
    }

    public function cursor() {
        foreach ($this->applyScopes()->query->cursor() as $record) {
            yield $this->newModelInstance()->newFromBuilder($record);
        }
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    protected  function yijianquchong()
    {
        // 配置信息
        $web_name='web_anxjm';
        $model=AnxjmPaizi::class;
        $n=3000;
        //anxjm 47600
        $c = Brand::whereNotNull($web_name)->orderBy('id', 'asc');
        $count = $c->count();
        if ($count > 0) {
            //$a = $c->first()->id;
            $a=203765;
            $b = $a +$n;
            $brands = Brand::whereBetween('id', [$a, $b])->cursor();
            $i=0;
            foreach ($brands as $item) {
                $brandname = $item->brandname;
                //长尾词
                /*$val = Brand::find($item->id);
                $kw = BrandRepositorie::importantbrandget($brandname);
                if ($val->important == null || empty($val->important))
                {
                    $val->important =$kw[1];
                    $val->save();
                }*/

                //去重
                $num =$model::where('brand', 'like', '%' . $brandname . '%')->count();
                if ($num > 0) {
                    $item->$web_name = 0;

                } else {
                    $item->$web_name = 1;
                }
                $item->save();
                $i=$i+1;
                ob_flush();
                flush();
                sleep(1);
            }
            if(isset($c->first()->id))
            {
                return  "去重成功！下次开始为:".$c->first()->id."剩余总数为".$count."共执行次数：".$i;
            }
            else
            {
                return '已全部去重成功!';
            }

        } else {
            return '没有数据要处理！';
        }
    }



}
