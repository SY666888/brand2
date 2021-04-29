<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Widgets\Metrics\RadialBar;
use Illuminate\Http\Request;
use App\Models\Brand;

class Zond51xxsps extends RadialBar
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('51加盟网数据统计');
        $this->height(400);
        $this->chartHeight(300);
        $this->chartLabels('有效品牌');
        $this->dropdown([
            '1' => '最近7天',
            '28' => '最近28天',
            '30' => '最近一个月',
            '365' => '最近一年',
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
        $zongshu=Brand::where('id','<>',0)->count();
        $brand_yx=Brand::where('web_51xxsp',1)->count();
        $brand_wx=Brand::where('web_51xxsp',0)->count();
        $brand_lq=Brand::where('web_51xxsp',-1)->count();
        $baifenbi=($brand_yx/$zongshu)*100;
        switch ($request->get('option')) {
            case '365':
            case '30':
            case '28':
            case '7':
            default:
                // 卡片内容
                $this->withContent($zongshu);
                // 卡片底部
                $this->withFooter($brand_yx, $brand_wx, $brand_lq);
                // 图表数据
                $this->withChart($baifenbi);
        }
    }

    /**
     * 设置图表数据.
     *
     * @param int $data
     *
     * @return $this
     */
    public function withChart(int $data)
    {
        return $this->chart([
            'series' => [$data],
        ]);
    }

    /**
     * 卡片内容
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex flex-column flex-wrap text-center">
    <h1 class="font-lg-1 mt-2 mb-0">{$content}</h1>
    <small>品牌总数</small>
</div>
HTML
        );
    }

    /**
     * 卡片底部内容.
     *
     * @param string $new
     * @param string $open
     * @param string $response
     *
     * @return $this
     */
    public function withFooter($new, $open, $response)
    {
        return $this->footer(
            <<<HTML
<div class="d-flex justify-content-between p-1" style="padding-top: 0!important;">
    <div class="text-center">
        <p>有效品牌</p>
        <span class="font-lg-1">{$new}</span>
    </div>
    <div class="text-center">
        <p>无效品牌</p>
        <span class="font-lg-1">{$open}</span>
    </div>
    <div class="text-center">
        <p>已领取品牌</p>
        <span class="font-lg-1">{$response}</span>
    </div>
</div>
HTML
        );
    }
}
