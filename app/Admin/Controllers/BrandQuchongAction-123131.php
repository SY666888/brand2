<?php

namespace App\Admin\Actions\Grid\ToolAction;
use Dcat\Admin\Grid\Tools\AbstractTool;
use  App\Models\AnxjmPaizi;
use  App\Models\Brand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BrandQuchongAction extends AbstractTool
{
    //protected  $title ='一键去重';
    protected $model;
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * 标题
     *
     * @return string
     */
    public function title()
    {
        return '一键去重';
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
    public function handle(Request $request)
    {
        // 获取当前行模型
        $model = $request->get('model');
        if (!Admin::user()->can('brand_quchong')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }
        // 获取要处理的数据
        $c = Brand::whereNull('web_anxjm')->orwhere('web_anxjm', '')->orderBy('id', 'asc');
        $count = $c->count();
        if ($count > 0) {
            $a = $c->first()->id;
            $b = $a + 1500;
            $brands = Brand::whereBetween('id', [$a, $b]);
            $brands = $brands->cursor();

            foreach ($brands as $item) {
                $brandname = $item->brandname;
                $num = $model::where('brand', 'like', '%' . $brandname . '%')->count();
                if ($num > 0) {
                    $item->web_anxjm = 0;

                } else {
                    $item->web_anxjm = 1;
                }
                $item->save();
            }

            if(isset($c->first()->id))
            {
                return $this->response()
                    ->success('去重成功！下次开始为：' . $c->first()->id . '剩余总数为：' . $count)
                    ->refresh();
            }
            else
            {
                return $this->response()
                    ->success('已全部去重成功！剩余总数为：' . $count)
                    ->refresh();
            }

        } else {
            return $this->response()
                ->warning('没有数据要处理！')
                ->refresh();
        }
    }
    /**
     * 对话框
     * @return string[]
     * public function confirm(): array
    {
    return ['确认要恢复吗？', '恢复的同时将会删除所有跟进记录！'];
    }
     */

    /**
     * 设置要POST到接口的数据
     *
     * @return array
     */
    public function parameters()
    {
        return [
            // 把模型类名传递到接口
            'model' => $this->model,
        ];
    }

}
