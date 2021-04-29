<?php
namespace App\Admin\Forms;
use  App\Models\Brand;
use Dcat\Admin\Admin;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Carbon\Carbon;
use function GuzzleHttp\default_ca_bundle;
/**
 * @package App\Admin\Forms
 */
class BrandOperationForm extends Form implements LazyRenderable
{
    use LazyWidget;
    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        // 获取当前行id
        $id = $this->payload['id'] ?? null;
        $model = $this->payload['model'] ?? null;
        //获取当前行数据
        $brand = $model::where('id', $id)->first();
        // 如果没有获取当前id则返回错误
        if (!$brand) {
            return $this->response()
                ->error('获取参数错误');
        }
        if ($brand->state==0) {
            return $this->response()
                ->warning('已经操作了，不用再次操作！');
        }
        if($brand->state==1){
           return $this->response()
                ->warning('不能对已经完成的品牌设置为废弃');
        }
        $user = Admin::user()->where('id', $brand->brand_userid)->first();
        // 如果没有找到这个分配者记录则返回错误
        if (!$user) {
            return $this->response()
                ->error('该用户不存在');
        }

        $brand->update([
            'state'=>0,
            'untype'=>$input['untype'],
        ]);

        return $this->response()
            ->success('信息提交成功！')
            ->refresh();
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $id = $this->payload['id'] ?? null;
        $this->select('untype','废弃原因')->options(['cf'=>'已发布','bcz'=>'不存在','wzl'=>'无资料','jzc'=>'禁止词','dyc'=>'地域词'])
        ->help('请选择该品牌不能发布的原因')->required();
        }

}
