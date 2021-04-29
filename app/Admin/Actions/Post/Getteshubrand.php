<?php
namespace App\Admin\Actions\Post;
use App\Models\TeshuBrand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Carbon\Carbon;
use Dcat\Admin\Grid\BatchAction;
use Illuminate\Http\Request;
class Getteshubrand  extends BatchAction
{
    protected $title = '👨‍ 领取';
    protected $model;
    // 注意构造方法的参数必须要有默认值
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * 处理动作逻辑
     * @return Response
     */

    public function  handle (Request  $request)
    {

        // 获取选中的文章ID数组
        $keys = $this->getKey();
        //获取传递的模型
        $model = $request->get('model');
        $user_id=Admin::user()->id;
        //https://www.jianshu.com/p/37084f1f7cc1
        $num=TeshuBrand::where('brand_userid',$user_id)->where('is_get',1)->whereDate('updated_at', Carbon::now()->toDateString())->count();
        if(in_array(Admin::user()->id,[1,21]))
        {
            $max_num=2000;
        }
        else
            {
                $max_num=300;
            }

        foreach ($keys as $id)
        {
            $lc = TeshuBrand::find($id);
            //数据比较
            if ($lc->count()>0)
                if($num>$max_num)
                {return $this->response()->warning("你已经超过当天领取最大次数！ ".$max_num." 请确定是否已经完成领取的数量！")->refresh();}
                else{
                    $lc->is_get=1;
                    $lc->state=-1;
                    $lc->brand_userid=Admin::user()->id;
                    $lc->brand_username=Admin::user()->name;
                    $lc->save();    }
            else
            {
                return $this->response()->error('数据为空，请选择数据！')->refresh();
            }

        }
        return  $this->response()->success('品牌领取成功!！')->refresh();
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

