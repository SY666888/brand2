<?php
namespace App\Admin\Actions\Grid\RowAction;
use  App\Models\Brand;
use  App\Models\AnxjmBrand;
use  App\Models\AnxjmNew;
use App\Models\W51xxspNew;
use App\Models\W51xxspBrand;
use  App\Models\AnxjmPaizi;
use App\Models\W51xxspPaizi;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GetnewsAction  extends RowAction
{
    protected $title = '📕资讯领取';
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
        if($model==AnxjmNew::class)
        {
            $web = AnxjmPaizi::class;
            $web_news='anx_news';
            $web_news_num='anx_news_num';
        }
        elseif ($model==W51xxspNew::class)
        {
            $web = W51xxspPaizi::class;
            $web_news='51xx_news';
            $web_news_num='51xx_news_num';
        }
        // 获取当前行ID
        $brand = $model::where('brand_id',$id)->first();
        $brandname = Brand::find($id);
        $brand_web = $web::where('brand','like','%'.$brandname->brandname.'%')->first();
                        
        //数据比较
        $userid=Admin::user()->id;
        $username=Admin::user()->name;
         if ($brand=== null) {
                 $brandname->$web_news=-1;
                 $brandname->$web_news_num=$brand->news_num??'-1';
                 $brandname->save();
                 $brand_get = new $model();
                 $brand_get->brand_id = $id;
                 $brand_get->brand_userid = $userid;
                 $brand_get->brand_username = $username;
                 $brand_get->save();
                 return $this->response()
                     ->success('资讯品牌领取成功!！')
                     ->refresh();
            
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
