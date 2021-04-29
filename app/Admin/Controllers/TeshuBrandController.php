<?php

namespace App\Admin\Controllers;
use App\Models\TeshuBrand;
//use App\Admin\Repositories\TeshuBrand;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use App\Admin\Actions\Post\Getteshubrand;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use Dcat\Admin\Http\Controllers\AdminController;

class TeshuBrandController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new TeshuBrand(), function (Grid $grid) {
            $grid->model()->where('is_get',0)->latest();
            $grid->column('id')->sortable();
            $grid->column('brandname');
            $grid->column('is_get')->display(function ($is_get){
                if ($is_get==0)
                    return '未领取';
                else
                    return '已领取';

            })->label();
            /*$grid->column('created_at');
            $grid->column('updated_at')->sortable();*/
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
            //禁用
            $grid->disableActions();
            $grid->disableBatchDelete();//批量操作
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableCreateButton();
            $grid->paginate(30);
            //批量处理
            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                $batch->add(new Getteshubrand(TeshuBrand::class));
            });
            //快速搜索
            if(Admin::user()->inRoles(['anx_news_editor','51xxsp_brand','anxjm_brand','user_jmlc'])) {
                $grid->quickSearch('brandname');
                $grid->rowSelector()->click();
            }
        else{
                $grid->quickSearch('brandname');
            }

            //导出

            if(in_array(Admin::user()->id,[1,21]))
            {
                $titles = ['brandname'=>'品牌名称'];
                $num=TeshuBrand::where('is_get',-9)->count();
                if($num<15000)
                {
                    $grid->export($titles)->disableExportAll()->rows(function (array $rows) {
                        foreach ($rows as $index => &$row) {
                            $id=$row['id'];
                            $dc=TeshuBrand::find($id);
                            $dc->is_get=-9;
                            $dc->brand_userid=Admin::user()->id;
                            $dc->brand_username=Admin::user()->name;
                            $dc->save();
                        }
                        return $rows;
                    });
                }
              else{
                  $grid->export()->disableExportAll();
                  $grid->export()->disableExportSelectedRow();
                  $grid->export()->disableExportCurrentPage();
              }
            }
         //tab
          if(Admin::user()->inRoles(['administrator']))
            {
                $grid->header(function () {
                    $tab = Tab::make();
                    $tab->addLink('无官网', '?source_id=0',$this->source_id==0? true : false);
                    $tab->addLink('有官网', '?source_id=1',$this->source_id==1? true : false);
                  return $tab;
            });
            }

            if ($this->source_id == 0)
            {
               $grid->model()->whereNull('url')->latest();
            }
           elseif ($this->source_id == 1)
            {
               $grid->column('url','网址')->link(function ($value) {
                    return admin_url('//'.$value);
                });
               $grid->model()->whereNotNull('url')->latest();
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
        return Show::make($id, new TeshuBrand(), function (Show $show) {
            $show->field('id');
            $show->field('brandname');
            $show->field('brand_username');
            $show->field('brand_userid');
            $show->field('state');
            $show->field('untype');
            $show->field('is_get');
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
        return Form::make(new TeshuBrand(), function (Form $form) {
            $form->display('id');
            $form->text('brandname');
            $form->text('brand_username');
            $form->text('brand_userid');
            $form->text('state');
            $form->text('untype');
            $form->text('is_get');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
