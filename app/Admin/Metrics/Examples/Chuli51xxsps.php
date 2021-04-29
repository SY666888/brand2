<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Widgets\Metrics\Round;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\AnxjmBrand;
use App\Models\W51xxspBrand;

class Chuli51xxsps extends Round
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('51加盟品牌处理情况');
        $this->chartLabels(['已完成', '未处理', '无效']);
        $this->dropdown([
            /*'7' => 'Last 7 Days',
            '28' => 'Last 28 Days',
            '30' => 'Last Month',
            '365' => 'Last Year',*/
        ]);
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
        $ylq=W51xxspBrand::where('id','<>',0)->count();
        $wcl=W51xxspBrand::where('state',-1)->count();
        $ywc=W51xxspBrand::where('state',1)->count();
        $feiqi=W51xxspBrand::where('state',0)->count();
        switch ($request->get('option')) {
            case '365':
            case '30':
            case '28':
            case '7':
            default:
                // 卡片内容
                $this->withContent($ylq, $wcl, $ywc,$feiqi);

                // 图表数据
                $this->withChart([round($ywc/$ylq*100,0), round($wcl/$ylq*100,0), round($feiqi/$ylq*100,0)]);

                // 总数
                $this->chartTotal('总共', $ylq);
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
            'series' => $data,
        ]);
    }

    /**
     * 卡片内容.
     *
     * @param int $finished
     * @param int $pending
     * @param int $rejected
     *
     * @return $this
     */
    public function withContent($ylq, $wcl, $ywc,$feiqi)
    {
        return $this->content(
            <<<HTML
<div class="col-12 d-flex flex-column flex-wrap text-center" style="max-width: 220px">
    <div class="chart-info d-flex justify-content-between mb-1 mt-2" >
          <div class="series-info d-flex align-items-center">
              <i class="fa fa-circle-o text-bold-700 text-primary"></i>
              <span class="text-bold-600 ml-50">已领取</span>
          </div>
          <div class="product-result">
              <span>{$ylq}</span>
          </div>
    </div>

    <div class="chart-info d-flex justify-content-between mb-1">
          <div class="series-info d-flex align-items-center">
              <i class="fa fa-circle-o text-bold-700 text-warning"></i>
              <span class="text-bold-600 ml-50">未处理</span>
          </div>
          <div class="product-result">
              <span>{$wcl}</span>
          </div>
    </div>

     <div class="chart-info d-flex justify-content-between mb-1">
          <div class="series-info d-flex align-items-center">
              <i class="fa fa-circle-o text-bold-700 text-danger"></i>
              <span class="text-bold-600 ml-50">已完成</span>
          </div>
          <div class="product-result">
              <span>{$ywc}</span>
          </div>
    </div>
    <div class="chart-info d-flex justify-content-between mb-1">
          <div class="series-info d-flex align-items-center">
              <i class="fa fa-circle-o text-bold-700 text-gray"></i>
              <span class="text-bold-600 ml-50">废弃</span>
          </div>
          <div class="product-result">
              <span>{$feiqi}</span>
          </div>
    </div>
</div>
HTML
        );
    }
}
