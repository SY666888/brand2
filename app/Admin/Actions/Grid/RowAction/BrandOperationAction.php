<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Admin\Forms\BrandOperationForm;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use  App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BrandOperationAction extends RowAction
{
    protected $title ='✂️废弃';
    //protected $model;

    public function __construct(string $model = null)
    {
         $this->model = $model;
    }
    
    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        /**
        if (!Admin::user()->can('FollowUp')) {
            return '你没有权限执行此操作！';

        }
     */

        // 实例化表单类并传递自定义参数
         $id = $this->getKey();
        $form = BrandOperationForm::make()->payload(['id' => $id,'model' =>$this->model]);
        $brandname=Brand::where('id',$this->getRow()->brand_id)->value('brandname');
        return Modal::make()
            ->lg()
            ->title('对' .$brandname. '进行处理')
            ->body($form)
            ->button($this->title);
    }

    

    
}


