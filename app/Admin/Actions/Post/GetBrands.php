<?php
namespace App\Admin\Actions\Post;
use  App\Models\Brand;
use  App\Models\AnxjmBrand;
use  App\Models\AnxjmPaizi;
use App\Models\W51xxspPaizi;
use App\Models\W51xxspBrand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\BatchAction;
use Illuminate\Http\Request;

class GetBrands  extends BatchAction
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
        if (!Admin::user()->can('pinpai_get')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }
        if ($model == AnxjmPaizi::class) {
            $web = AnxjmBrand::class;
            $web_name = 'web_anxjm';
        } elseif ($model == W51xxspPaizi::class) {
            $web = W51xxspBrand::class;
            $web_name = 'web_51xxsp';
        }
        //循环修改数据
        $info="";
        foreach ($keys as $id)
        {
            $brand = $web::where('brand_id',$id)->first();
            $brandname = Brand::find($id);
            //数据比较
            $userid=Admin::user()->id;
            $username=Admin::user()->name;
            //数据比较
            if ($brand === null)
                {
                $a = $model::where('brand', 'like', '%' . $brandname->brandname . '%')->count();
                    if ($a > 0)
                    {
                        $brandname->$web_name = 0;
                        $brandname->save();
                        //$this->response()->error('id为：'.$id.'的品牌已经发布过！')->refresh();
                        //$a1='id为：'.$id.'的品牌已经发布过！';
                        $info.=$id.",";

                        }
                    else {
                        $brandname->$web_name = -1;
                        $brandname->save();
                        $brand_get = new $web();
                        $brand_get->brand_id = $id;
                        $brand_get->brand_userid = $userid;
                        $brand_get->brand_username = $username;
                        $brand_get->save();
                        }
                    }
            else
                {
                if ($brand->brand_userid == $userid)
                    {
//                        return $this->response()
//                            ->error('id为：'.$id.'品牌已经被你领取，无需重新领取！！')->refresh();
                    $a2='id为：'.$id.'品牌已经被你领取，无需重新领取！！';
                    $info.=$id.",";
                    }
                else
                    {
                    //return $this->response()
                       // ->error('id为：'.$id.'的品牌已经被其它人领取，不能领取！！')->refresh();
                        $info.=$id.",";
                    }
                }
        }
        if (!empty($info))
        {   return $this->response()->html($info)->error('id 为：'.$info.'的品牌不能领取')->refresh();
            //return $this->response()->error('id 为：'.$info.'的品牌不能领取')->refresh();

        }
        else
            {
                return  $this->response()->success('品牌领取成功!！')->refresh();


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

