<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Widgets\Metrics\Line;
use Illuminate\Http\Request;
use App\Models\TeshuBrand;
use Dcat\Admin\Admin;
use Carbon\Carbon;

class NewUsers extends Line
{
    /**
     * 初始化卡片内容
     *
     * @return void
     */
    protected function init()
    {
        parent::init();
        $this->subTitle('最近7天');
        $this->title='品牌发布量';
        $this->chartMarginBottom(15);
        /*$this->chartStraight();*/
        $this->dropdown(
           [
            '0'=>'今天：'.TeshuBrand::getxingqi(0),
            '1'=>'昨天：'.TeshuBrand::getxingqi(1),
            '2'=>'前天：'.TeshuBrand::getxingqi(2),
            '3'=>TeshuBrand::getxingqi(3),
            '4'=>TeshuBrand::getxingqi(4),
            '5'=>TeshuBrand::getxingqi(5),
            '6'=>TeshuBrand::getxingqi(6),          

           ]
        );
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        $generator = function ($len, $min = 10, $max = 300) {
            for ($i = 0; $i <= $len; $i++) {
                yield mt_rand($min, $max);
            }
        };

        $username=TeshuBrand::pluck('brand_username');
        
        
        switch ($request->get('option')) {
           
            case '1': 
            $this->label=TeshuBrand::strusers(1);            
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(1));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
             case '2':
             $this->label=TeshuBrand::strusers(2);             
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(2));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
             case '3': 
             $this->label=TeshuBrand::strusers(3);            
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(3));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
             case '4': 
             $this->label=TeshuBrand::strusers(4);            
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(4));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
             case '5': 
             $this->label=TeshuBrand::strusers(5);            
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(5));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
             case '6':
             $this->label=TeshuBrand::strusers(6);             
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(6));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
                break;
            case '0':
            default: 

                $this->label=TeshuBrand::strusers(0);     
                // 卡片内容
                $this->withContent(TeshuBrand::getdays(0));
                // 图表数据
                $this->withChart(TeshuBrand::getTimingHistorys(7));
        }

    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withChart(array $data)
    {
        return $this->chart([
            'series' => [
                [    
                    'name' =>'品牌领取量',
                    'data' => $data               
                ], 
                [
                 'data' =>TeshuBrand::get_dates(7), 
                 'name' =>'日期',  
                ],
                   
            ],
            /*'tooltip' => [
                'x' => [
                    'show' => true
                ]
            ],*/

        ]);
    }

    /**
     * 设置卡片内容.
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
   <h2 class="ml-1 font-lg-1">{$content}</h2>
    <span class="mb-0 mr-1 text-80"></span>
    <div class="metric-footer">
     {$this->label}  
    </div>

</div>

<style>
     .metric-footer{
        font-size: 10;
        padding-top: 5px;
        padding-left: 20px;
        background: none !important;
        /*color: #a8a9bb !important;*/
    }
    .card-box-title{font-weight:bold; }
    
</style>
HTML
        );
    }
}
