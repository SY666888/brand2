<?php

namespace App\Admin\Controllers;
use App\Models\W51xxspPaizi;
use App\Admin\Repositories\AnxjmPaizi;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class W51xxspPaiziControlle extends AdminController
{

    protected  $title='51加盟网品牌管理';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new W51xxspPaizi(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('brand','品牌名称');
            $grid->column('news_num','资讯数量')->sortable();
            $grid->column('type','分类');
            $grid->column('url','网址');
            $grid->column('retype','子分类');
            $grid->column('time','创建时间');
            //$grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            //快速搜索
            $grid->quickSearch('brand','type','retype');
            //禁用
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            //分页
            $grid->paginate(30);
            $grid->showBatchDelete();
            $grid->enableDialogCreate();
            $grid->showQuickEditButton();
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
        return Show::make($id, new W51xxspPaizi(), function (Show $show) {
            $show->field('id');
            $show->field('brand');
            $show->field('type');
            $show->field('url');
            $show->field('retype');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new W51xxspPaizi(), function (Form $form) {
            $form->display('id');
            $form->text('brand');
            $form->text('type');
            $form->text('url');
            $form->text('type0');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
