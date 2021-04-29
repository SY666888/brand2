<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Grid\ToolAction\BrandQuchongAction;
use App\Admin\Repositories\Brand;
use App\Models\Brand as  BrandModel;
use App\Models\AnxjmPaizi;
use App\Models\AnxjmNew;
use App\Models\AnxjmBrand;
use App\Admin\Actions\Post\BatchRestore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Http\Request;
use App\Admin\Actions\Grid\RowAction\GetAction;
use App\Admin\Actions\Grid\RowAction\GetnewsAction;
use App\Admin\Grid\Displayers\RowActions;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Actions\Post\GetBrands;

class BrandGetController extends AdminController
{
    protected $title='安心加盟网品牌领取';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Brand(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('brandname','品牌名称');
            $grid->column('type')->filter();
            $grid->column('retype','子分类')->filter()->width('10%');
            $grid->column('source_url','来源')->width('10%')->limit(35);
            $grid->column('web_anxjm', '是否发布')
               /* ->display(function ($value) {
                $num=AnxjmPaizi::where('brand','like','%'.$this->brandname.'%')->count();
                $val=BrandModel::find($this->id);
                if ($val->web_anxjm==null||empty($val->web_anxjm))
                {
                    if($num>0)
                    {
                        $val->web_anxjm=0;
                    }
                    else
                    {
                        $val->web_anxjm=1;
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
            ])->width('7%');
            //判断是否是有下拉词的品牌
            $grid->column('important', '百度下拉词')
               /* ->display(function ($value) {
                $val = BrandModel::find($this->id);
                $kw = Brand::importantbrandget($this->brandname);
                if ($val->important == null || empty($val->important))
                {
                        $val->important =$kw[1];
                        $val->save();
               }
                return $value;
            })*/
               ->width('10%')->sortable();
            //判断资讯数量
            if(Admin::user()->inRoles(['anx_news_editor','administrator']))
            {
                $grid->column('anx_news_num', '已发布资讯数量')
                    ->display(function ($value) {
                        $val = BrandModel::find($this->id);
                        $brand = AnxjmPaizi::where('brand','like','%'.$val->brandname.'%')->first();
                        if ($this->anx_news==-1)
                        {
                            $value='<span class="label bg-primary ">已领取</span>';

                        }
                        else
                            {
                                if($val->anx_news_num===null){
                                    $value='未检测';
                                    if($brand)//if($brand!==null)
                                        {
                                            $val->anx_news_num=$brand->news_num;
                                            $val->save();
                                        }
                                }
                                else{
                                    $value=$val->anx_news_num;
                                }
                            }
                        return $value;
                    });
                $grid->actions(function (RowActions $actions){
                    $actions->append(new GetnewsAction(AnxjmNew::class));
                });

            }
            //领取
            $grid->actions(function (RowActions $actions){
                    $actions->append(new GetAction(AnxjmPaizi::class));
            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('type','大分类')->multipleSelect(Brand::gettypesall())->width(3);
                $filter->equal('retype','小分类')->multipleSelect(Brand::getretypesall())->width(3);
            });

            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                if (request('_scope_') == 'trashed') {
                    $batch->add(new BatchRestore(BrandModel::class));
                }
            });
            //批量处理
            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                $batch->add(new GetBrands (AnxjmPaizi::class));
            });
            //工具栏
            if(Admin::user()->isRole('administrator'))
            {
                $grid->tools([
                    new BrandQuchongAction(AnxjmPaizi::class)
                ]);
            }

            //快速搜索
            $grid->quickSearch('brandname','retype','type');
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
                $titles = ['brandname' => '品牌名称', 'type' => '分类','retype' => '子分类','web_anxjm'=>'是否发布','important'=>'下拉词数量'];
                $grid->export($titles)->rows(function (array $rows) {
                    foreach ($rows as $index => &$row) {
                        $id=$row['id'];
                        $lc=BrandModel::find($id);
                        $lc->web_anxjm=-9;
                        $lc->save();
                    }
                    return $rows;
                });
            }

            //列表筛选
            $grid->header(function () {
                $tab = Tab::make();
                $tab->addLink('有效', '?source_id=0',$this->source_id==0? true : false);
                $tab->addLink('无效', '?source_id=1',$this->source_id==1 ? true : false);
                $tab->addLink('未检测', '?source_id=2',$this->source_id==2 ? true : false);
                $tab->addLink('有下拉词品牌', '?source_id=3',$this->source_id==3? true : false);
                $tab->addLink('无下拉词品牌', '?source_id=4',$this->source_id==4? true : false);
                $tab->addLink('资讯', '?source_id=5',$this->source_id==5? true : false);
                return $tab;
            });
            if ($this->source_id == 0)
            {
                   $grid->model()->where('web_anxjm',1);
                   /* ->whereNotIn('type',['保健','健身','美容','家居','生活服务','干洗','酒店'])
                    ->whereNotIn('retype',['保健','美容','家居','家具','干洗','家电']);*/
                //$grid->model()->where('web_anxjm',1)->inRandomOrder();
            }
            elseif ($this->source_id == 1)
            {   if(Admin::user()->inRoles(['anx_news_editor','administrator']))
                {
                    $grid->model()->where('web_anxjm',0);
                }
                else
                    {$grid->model()->where('web_anxjm',0);}

            }
            elseif ($this->source_id == 2)
            {
                $grid->model()->whereNull('web_anxjm');
            }
            elseif ($this->source_id == 3)
            {
                $grid->model()->where('important','>',0);

            }
            elseif ($this->source_id == 4)
            {
                $grid->model()->where('important',0);
            }
            elseif ($this->source_id == 5)
            {
                $grid->model()->whereNotNull('anx_news_num');
                //筛选
                $grid->selector(function (Grid\Tools\Selector $selector) {
                $selector->select('anx_news_num', '资讯', ['无资讯', '有资讯','已领取'], function ($query, $value) {
                    $t = [
                        ['where','anx_news_num','=',0],
                        ['where','anx_news_num','>',0],
                        ['where','anx_news','=',-1],
                    ];

                    $value = current($value);
                    //$query->whereBetween('price', $t[$value]);
                    $r=$t[$value][0];
                    $query->$r($t[$value][1],$t[$value][2],$t[$value][3]);
                    });
                    $selector->select('important', '长尾词数', ['无', '有','1-3','5-10','>10'], function ($query, $value) {
                        $t = [
                            ['where','important',0],
                            ['where','important','>=',1],
                            ['whereBetween','important',[1,4]],
                            ['whereBetween','important',[5,10]],
                            ['where','important','>',10],
                        ];
                        $value = current($value);
                        //$query->whereBetween('price', $t[$value]);
                        $r=$t[$value][0];
                        if(!empty($t[$value][3]))
                            $query->$r($t[$value][1],$t[$value][2],$t[$value][3]);
                        else
                            $query->$r($t[$value][1],$t[$value][2]);
                    });
                });
            }

            if(in_array($this->source_id,[3,4]))
            {
                //筛选
                $grid->selector(function (Grid\Tools\Selector $selector) {
                    $selector->selectOne('web_anxjm', '是否有效：', [
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
