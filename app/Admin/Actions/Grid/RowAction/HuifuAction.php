<?php

namespace App\Admin\Actions\Grid\RowAction;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class HuifuAction  extends RowAction
{
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
        return '🔧️恢复';
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(Request $request)
    {
        // 获取当前行ID
         $id = $this->getKey();
        /*if (!Admin::user()->can('brand_huifu')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }*/
        // 获取 parameters 方法传递的参数
        //$username = $request->get('username');
        $model = $request->get('model');
        $brand=$model::find($id);
        $brand->state=-1;
        $brand->untype=null;
        $brand->save();
        // 返回响应结果并刷新页面
        return $this->response()->success("已完成恢复！")->refresh();
    }

    /**
     * 对话框
     * @return string[]
     */
     public function confirm(): array

    {
    return ['确认要恢复吗？', '恢复的同时将会删除操作记录！'];
    }




     /**
     * 设置要POST到接口的数据
     *
     * @return array
     */
    public function parameters()
    {
        return [
            // 发送当前行 username 字段数据到接口
            //'username' => $this->row->brand_username,
            // 把模型类名传递到接口
            'model' => $this->model,
        ];
    }

}
