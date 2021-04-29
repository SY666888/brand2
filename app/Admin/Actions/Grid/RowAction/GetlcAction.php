<?php

namespace App\Admin\Actions\Grid\RowAction;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use App\Models\Liuchengku;
//use Illuminate\Database\Eloquent\Model;

class GetlcAction  extends RowAction
{
    protected $action;
    // 注意action的构造方法参数一定要给默认值
    public function __construct($title = null,$action = null)
    {
         $this->title = $title;
         $this->action = $action;
    }

    /**
     * 标题
     *
     * @return string
     
    public function title()
    {
        return '已完成';
    }
*/
    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(Request $request)
    {
        // 获取当前行ID
         $id = $this->getKey();
        // 获取 parameters 方法传递的参数
        //$username = $request->get('username');
        $action = $request->get('action');
        $brand=Liuchengku::find($id);
        $brand->$action=1;    
        $brand->save(); 
        // 返回响应结果并刷新页面
        return $this->response()->success("已完成！")->refresh();          
        
    }

    /**
     * 对话框
     * @return string[]
     
     public function confirm(): array

    {
    return ['确认要恢复吗？', '恢复的同时将会删除操作记录！'];
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
            // 发送当前行 username 字段数据到接口
            //'username' => $this->row->brand_username,
            // 把模型类名传递到接口
            'action' => $this->action,
        ];
    }

}
