<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Grid\ToolAction\BrandQuchongAction;
use App\Admin\Repositories\Brand;
use App\Models\Brand as  BrandModel;
use App\Models\W51xxspPaizi;
use App\Models\W51xxspBrand;
use App\Admin\Actions\Post\BatchRestore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use App\Admin\Actions\Grid\RowAction\GetAction;
use App\Admin\Grid\Displayers\RowActions;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Actions\Post\GetBrands;

class BrandGet51xxspControlle extends AdminController
{
    protected $title='51加盟网品牌领取';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Brand(), function (Grid $grid) {
            //$grid->model()->whereNull('web_51xxsp');
            $grid->column('id')->sortable();
            $grid->column('brandname','品牌名称');
            $grid->column('type')->filter();
            $grid->column('retype','子分类')->filter();
            $grid->column('source_url','来源')->limit(50);
            //$grid->column('created_at');
            //$grid->column('updated_at')->sortable();
            $grid->column('web_51xxsp', '是否发布')
              /*  ->display(function ($value) {
                $num=W51xxspPaizi::where('brand','like','%'.$this->brandname.'%')->count();
                $val=BrandModel::find($this->id);
                if ($val->web_51xxsp==null||empty($val->web_51xxsp))
                {
                    if($num>0)
                    {
                        $val->web_51xxsp=0;
                    }
                    else
                    {
                        $val->web_51xxsp=1;
                    }
                    $val->save();
                }
                return $value;
            })*/
                ->using([0 => '无效', 1 => '有效', -1 => '已领取'])->label([
                'default' => 'primary', // 设置默认颜色，不设置则默认为 default
                0 => 'dark60',
                1 => 'primary',
                -1 => 'warning',
            ]);
            //判断是否是有下拉词的品牌
            $grid->column('important', '百度下拉词数量')
                /*->display(function ($value) {
                $val = BrandModel::find($this->id);
                $kw = Brand::importantbrandget($this->brandname);
                if ($val->important == null || empty($val->important))
                {
                    $val->important =$kw[1];
                    $val->save();
                }
                return $value;
            })*/
                ->sortable();
            /*//判断资讯数量
            if(Admin::user()->inRoles(['news_editor','administrator']))
            {
                $grid->column('news_num', '已发布资讯数量')
                    ->display(function ($value) {
                        $val = BrandModel::find($this->id);
                        $brand = W51xxspPaizi::where('brand','like','%'.$val->brandname.'%')->first();
                        $value=$brand->news_num??'未检测';
                        return $value;
                    });
            }
*/
            //领取
            $grid->actions(function (RowActions $actions){
                $actions->append(new GetAction(W51xxspPaizi::class));
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('type','大分类')->multipleSelect(Brand::gettypesall())->width(3);
            });

            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                if (request('_scope_') == 'trashed') {
                    $batch->add(new BatchRestore(BrandModel::class));
                }
            });
            //批量领取
            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                $batch->add(new GetBrands (W51xxspPaizi::class));
            });
            //工具栏
            if(Admin::user()->isRole('administrator'))
            {
                $grid->tools([
                    new BrandQuchongAction(W51xxspPaizi::class)
                ]);
            }

            //快速搜索
            $grid->quickSearch('brandname','type','retype', 'source_url');
            //禁用
            $grid->disableBatchDelete();//批量操作
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            //分页
            $grid->paginate(30);
            //导出
            if (Admin::user()->isRole('administrator'))
            {
                $titles = ['brandname' => '品牌名称', 'type' => '分类', 'retype' => '子分类', 'Source_Url' => '来源', 'web_51xxsp' => '是否发布', 'important' => '下拉词数量'];
                $grid->export($titles);
            }
            //列表筛选
            $grid->header(function () {
                $tab = Tab::make();
                $tab->addLink('有效', '?source_id=0',$this->source_id==0? true : false);
                $tab->addLink('无效', '?source_id=1',$this->source_id==1 ? true : false);
                $tab->addLink('未检测', '?source_id=2',$this->source_id==2 ? true : false);
                $tab->addLink('有下拉词品牌', '?source_id=3',$this->source_id==3? true : false);
                $tab->addLink('无下拉词品牌', '?source_id=4',$this->source_id==4? true : false);
                return $tab;
            });
            if ($this->source_id == 0)
            {
                $grid->model()->where('web_51xxsp',1);
            }
            elseif ($this->source_id == 1)
            {
                $grid->model()->where('web_51xxsp',0);
            }
            elseif ($this->source_id == 2)
            {
                $grid->model()->whereNull('web_51xxsp');
            }
            elseif ($this->source_id == 3)
            {
                $grid->model()->where('important','>',0);

            }
            elseif ($this->source_id == 4)
            {
                $grid->model()->where('important',0);
            }


            if(in_array($this->source_id,[3,4]))
            {
                //筛选
                $grid->selector(function (Grid\Tools\Selector $selector) {
                    $selector->selectOne('web_51xxsp', '是否有效：', [
                        0 => '无效',
                        1 => '有效',
                        -1 => '已领取',
                    ]);
                });

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
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
