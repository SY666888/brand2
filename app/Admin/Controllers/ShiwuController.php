<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Shiwu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use App\Models\Shiwu as Shiwumodel;
use App\Admin\Actions\Post\Restore;
use Dcat\Admin\Http\Controllers\AdminController;

class ShiwuController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Shiwu(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('type')
                ->display(function ($type){
                $str1=array('chuanggui','anx_brand','51xxsp_brand');
                $str2=array('常规','安心品牌','51品牌');
                return str_replace($str1,$str2,$type);
            })->explode(',')->label('info');

            $grid->column('beizhu')->limit(20);
            $grid->column('is_do')
                ->using([-1 => '进行中', 0 => '已结束', 1 => '已完成'])
                ->badge([
                    -1 =>'warning',
                    0=> 'danger',
                    1 => 'primary',
                ]);
            $grid->column('is_who');
            $grid->column('starttime');
            $grid->column('endtime')->display( function ($endtime){
                if($endtime==null)
                    return '未结束';
                else
                    return  $endtime;
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->scope('trashed', '回收站')->onlyTrashed();
            });
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if (request('_scope_') == 'trashed') {
                    $actions->append(new Restore( Shiwumodel::class));
                }
            });
            //功能开启
            $grid->enableDialogCreate();
            $grid->enableDialogCreate();
            $grid->showQuickEditButton();
            //禁用
            $grid->disableViewButton();
            $grid->disableEditButton();
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Shiwu(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('type');
            $show->field('beizhu');
            $show->field('is_do');
            $show->field('is_who');
            $show->field('starttime');
            $show->field('endtime');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Shiwu(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->multipleSelect('type')->options(['chuanggui' => '常规', 'anx_brand' => '安心品牌', '51xxsp_brand' => '51品牌'])
                ->required()->saving(function ($value) {
                    // 转化成json字符串保存到数据库
                    //return json_encode($value);
                    return  implode(',',$value);
                });
            $form->textarea('beizhu')->rows(10);
            $form->radio('is_do')->options([-1 => '进行中', 0 => '已结束', 1 => '已完成'])->default('-1');
            $form->text('is_who')->default('兼职-编辑');
            $form->datetime('starttime')->format('YYYY-MM-DD HH:mm:ss')->default(Carbon::now());
            $form->datetime('endtime')->format('YYYY-MM-DD HH:mm:ss');
        });
    }
}
