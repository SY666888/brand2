<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Brand;
use App\Models\Brand as  BrandModel;
use App\Admin\Actions\Post\BatchRestore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BrandController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Brand(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('brandname');
            $grid->column('type')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('retype')->filter(
                Grid\Column\Filter\Like::make()
            );
            $grid->column('source_url')->limit(50);
            //$grid->column('web_id');
            //$grid->column('created_at');
            //$grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('brandname', '品牌名称');
                $filter->scope('trashed', '回收站')->onlyTrashed();

            });
            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                if (request('_scope_') == 'trashed') {
                    $batch->add(new BatchRestore(BrandModel::class));
                }
            });
            //快速搜索
            $grid->quickSearch('brandname','type','retype', 'source_url');
            //禁用
            $grid->disableEditButton();
            $grid->disableViewButton();
            //分页
            $grid->paginate(30);
            $grid->showBatchDelete();
            $grid->enableDialogCreate();
            $grid->showQuickEditButton();
            //导出
            $titles = ['brandname' => '品牌名称', 'type' => '分类','retype' => '子分类'];
            $grid->export($titles);

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
        return Show::make($id, new Brand(), function (Show $show) {
            $show->field('id');
            $show->field('brandname');
            $show->field('type');
            $show->field('retype');
            $show->field('source_url');
            $show->field('web_id');
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
        return Form::make(new Brand(), function (Form $form) {
            $form->display('id');
            $form->text('brandname');
            $form->text('type');
            $form->text('retype');
            $form->text('source_url');
            $form->text('web_anxjm');
            $form->text('web_51xxsp');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
