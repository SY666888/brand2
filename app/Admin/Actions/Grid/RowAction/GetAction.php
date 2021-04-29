<?php

namespace App\Admin\Actions\Grid\RowAction;
use  App\Models\AnxjmPaizi;
use  App\Models\Brand;
use  App\Models\AnxjmBrand;
use App\Models\W51xxspPaizi;
use App\Models\W51xxspBrand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GetAction  extends RowAction
{
    protected $title = '👨‍ 领取';
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(Request $request)
    {
        // 获取当前行ID
         $id = $this->getKey();
         //获取传递的模型
        $model = $request->get('model');
        if (!Admin::user()->can('pinpai_get')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }
        if($model==AnxjmPaizi::class)
        {
            $web=AnxjmBrand::class;
            $web_name='web_anxjm';
        }
        elseif ($model==W51xxspPaizi::class)
        {
            $web=W51xxspBrand::class;
            $web_name='web_51xxsp';
        }
        // 获取当前行ID
        $brand = $web::where('brand_id',$id)->first();
        $brandname = Brand::find($id);
        //数据比较
        $userid=Admin::user()->id;
        $username=Admin::user()->name;
         if ($brand=== null) {
             $a =$model::where('brand', 'like', '%' . $brandname->brandname . '%')->count();
             if ($a>0)
             {
                 $brandname->$web_name=0;
                 $brandname->save();
                 return $this->response()
                     ->error('该品牌已经发布过！')
                     ->refresh();

             }
             else {
                 $brandname->$web_name=-1;
                 $brandname->save();
                 $brand_get = new $web();
                 $brand_get->brand_id = $id;
                 $brand_get->brand_userid = $userid;
                 $brand_get->brand_username = $username;
                 $brand_get->save();
                 return $this->response()
                     ->success('品牌领取成功!！')
                     ->refresh();
             }
         }
         else
         {
             if($brand->brand_userid==$userid)
             {
                 return $this->response()
                     ->error('该品牌已经被你领取，无需重新领取！！')->refresh();
             }
             else
             { return $this->response()
                 ->error('该品牌已经被其它人领取，不能领取！！')->refresh();
             }
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
