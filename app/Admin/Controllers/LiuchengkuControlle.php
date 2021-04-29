<?php

namespace App\Admin\Controllers;
use App\Models\Liuchengku;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use App\Admin\Actions\Post\GetLc;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Dcat\Admin\Http\Controllers\AdminController;

class LiuchengkuControlle extends AdminController
{
    protected  $title='加盟信息库';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Liuchengku(), function (Grid $grid) {
            $grid->model()->whereNull('is_make')->orwhere('is_make',0);
            $grid->column('id')->width('5%')->sortable();
            $grid->column('brand','品牌名称')->width('8%');
            $grid->column('retype','小分类')->width('5%');
            //$grid->column('url','网址');
            $grid->column('type','大分类')->width('5%');
            //$grid->column('updated_at')->sortable();
            //快速搜索
            $grid->quickSearch('brand','type','retype');
            if(in_array(Admin::user()->id,[1,6,4,5]))
            {
                $grid->quickSearch('jmys','jmzc');
            }
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('type','大分类')->multipleSelect(Liuchengku::gettypesall('jmlcs','type'))->width(3);
                $filter->equal('retype','小分类')->multipleSelect(Liuchengku::gettypesall('jmlcs','retype'))->width(3);
            });
            //禁用
            $grid->disableBatchDelete();//批量操作
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableCreateButton();
            //$grid->disableQuickEditButton();
            //分页
            $grid->paginate(30);
            //$grid->showBatchDelete();
            //$grid->enableDialogCreate();
            $grid->showQuickEditButton();

            //批量处理
            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                $batch->add(new GetLc(Liuchengku::class));
            });
            //列表筛选
            $grid->header(function () {
                $tab = Tab::make();
                $tab->addLink('加盟优势', '?source_id=0',$this->source_id==0 ? true : false);
                $tab->addLink('加盟支持', '?source_id=1',$this->source_id==1 ? true : false);
                $tab->addLink('加盟流程', '?source_id=2',$this->source_id==2? true : false);
                return $tab;
            });
            if ($this->source_id == 0)
            {
                $grid->column('jmys','加盟优势')->width('50%')->limit('150');
                $grid->model()->whereNotNull('jmys');
            }
            elseif ($this->source_id == 1)
            {
                $grid->column('jmzc','加盟支持')->width('50%')->limit('150');
                $grid->model()->whereNotNull('jmzc');
            }
            elseif ($this->source_id == 2)
            {
                $grid->column('jmlc','加盟流程')->width('50%')->limit('150');
                $grid->model()->whereNotNull('jmlc');
            }


        });
    }
    //构造方法获取浏览器参数
    public function __construct(Request $request)
    {
        $this->source_id = $request->source_id;
        return $this;
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
        return Show::make($id, new Liuchengku(), function (Show $show) {
            $show->field('id');
            $show->field('brand');
            $show->field('type');
            $show->field('retype');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Liuchengku(), function (Form $form) {
            $form->display('id');
            $form->text('brand');
            $form->text('retype');
            $form->text('type');
            $form->text('is_make');
            $form->text('user_id');
            $form->textarea('jmlc');
            $form->textarea('jmzc');
            $form->textarea('jmys');
        });
    }
}
