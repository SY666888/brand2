<?php

namespace App\Admin\Controllers;
use App\Models\TeshuBrand;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\Tab;
use Carbon\Carbon;
use App\Admin\Actions\Grid\RowAction\BrandOperationAction;
use App\Admin\Actions\Grid\RowAction\CompleteAction;
use App\Admin\Actions\Grid\RowAction\HuifuAction;
use App\Admin\Grid\Displayers\RowActions;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Row;
use App\Admin\Metrics\Examples\NewDevices;
use App\Admin\Metrics\Examples\NewUsers;
use App\Admin\Metrics\Examples\TotalUsers;
use Dcat\Admin\Http\Controllers\AdminController;

class TeshuBrandDoController extends AdminController
{
    protected  $title='品牌执行';

    /**
     * Make a content.
     *
     * @return content
     */

    public function index(Content $content):content
    {
        return $content
            ->header('品牌执行')
            ->description('品牌筛选处理')
            ->body(function (Row $row) {
                if (Admin::user()->isRole('administrator')){
                    $row->column(4, new NewUsers());
                    $row->column(4, new Card('当天领取品牌数量:', view('tongji.todo')->with('data',TeshuBrand::getusers(0,'users_getbrand'))));
                }
                /* $row->column(4, new TotalUsers());*/
            })
            ->body($this->grid());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new TeshuBrand(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('brandname','品牌名称')->copyable()
            ->display(function ($brandname){
                if($this->url!=null)
                {
                    return  '<a href="'.$this->url.'">'.$brandname.'</a>';
                }

                else
                {
                 return  $brandname;
                }

            });
            $grid->column('brand_username','执行人');
            $grid->column('state','状态')->using([0 => '废弃', 1 => '完成', -1 => '未处理'])->label([
                'default' => 'primary', // 设置默认颜色，不设置则默认为 default
                0 => 'dark60',
                1 => 'primary',
                -1 => 'warning',
            ]);
            if ($this->source_id ==2 || $this->source_id=='a2')
            {
                $grid->column('untype','具体原因')
                    ->using(['cf'=>'✤ 已发布','bcz'=>'☒ 不存在','wzl'=>'✎ 无资料','jzc'=>'✖ 禁止词','dyc'=>'☮ 地域词']);
            }
            $grid->column('updated_at')
                ->display(function ($updated_at)
                {
                    $expired_at=Carbon::now()->subDays(7);//addDays(30) 向前加30天，subDays(30)向后减掉30天
                    if($updated_at<$expired_at){
                        return  $updated_at;
                    }
                    else{
                        return Carbon::parse($updated_at)->diffForHumans();//或者 (new Carbon(data))->diffForHumans()
                    }

                });
            //$grid->column('created_at')->sortable();
            if (Admin::user()->isRole('administrator'))
            {
                $grid->filter(function (Grid\Filter $filter) {
                    $filter->panel();
                    $filter->equal('brand_userid','发布者')->select(TeshuBrand::where('is_get',1)->distinct()->pluck('brand_username','brand_userid'))->width(2);
                    $filter->between('updated_at', '发布时间')->date()->width(4);;
                });
            }
            //快速搜索
            $grid->quickSearch('brandname','user_name');
            //禁用
            $grid->disableBatchDelete();//批量操作
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            //行操作按钮
            $grid->actions(function (RowActions $actions) {
                if($this->state==0)
                {
                    $actions->append(new HuifuAction(TeshuBrand::class));
                }
                elseif($this->state==-1)
                {
                    $actions->append(new BrandOperationAction(TeshuBrand::class));
                    $actions->append(new CompleteAction(TeshuBrand::class));
                }

            });
            $grid->header(function () {
                $tab = Tab::make();
                if(Admin::user()->inRoles(['administrator', 'admin']))
                {
                    $tab->addLink('未处理的', '?source_id=a0',$this->source_id=='a0'? true : false);
                    $tab->addLink('已完成的', '?source_id=a1',$this->source_id=='a1' ? true : false);
                    $tab->addLink('无效的', '?source_id=a2',$this->source_id=='a2'? true : false);
                }
                else{
                    $tab->addLink('未处理', '?source_id=0',$this->source_id==0? true : false);
                    $tab->addLink('已完成', '?source_id=1',$this->source_id==1? true : false);
                    $tab->addLink('失效', '?source_id=2',$this->source_id==2? true : false);
                }

                return $tab;
            });

            if ($this->source_id =='a0') {
                $grid->model()->where('state',-1)->orderBy('updated_at','desc');
                $grid->column('url','网址')->display(function ($url){
                if($url!=null)
                 return  '<a href="//'.$this->url.'" target="_blank">点击打开官网</a>';
                else
                  return '无';
                

                });
            }
           
            elseif ($this->source_id =='a1'){
                $grid->model()->where('state',1)->orderBy('updated_at','desc');
            }
            elseif ($this->source_id =='a2'){
                $grid->model()->where('state',0)->orderBy('updated_at','desc');
            }

            //判断2
            elseif ($this->source_id ==0) {
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',-1)->orderBy('updated_at','desc');
                $grid->column('url','网址')->link(function ($value) {
                    return admin_url('//'.$value);
                });
                if(in_array(Admin::user()->id,[1,17,18,19,20,21]))
                {
                    //导出
                    $titles = ['brandname'=>'品牌名称'];
                    $grid->export($titles)->disableExportAll()->rows(function (array $rows) {
                        foreach ($rows as $index => &$row) {
                            $id=$row['id'];
                            $dc=TeshuBrand::find($id);
                            $dc->state=-9;
                            $dc->save();
                        }
                        return $rows;
                    });
                }
            }
            elseif ($this->source_id ==1){
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',1)->orderBy('updated_at','desc');
            }
            elseif ($this->source_id ==2){
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',0)->orderBy('updated_at','desc');
            }

            //筛选
            $grid->selector(function (Grid\Tools\Selector $selector) {
                //失效
                if(in_array($this->source_id,['a2',2]))
                {

                    $selector->selectOne('untype', '失效原因：',
                        ['cf'=>'✤ 已发布','bcz'=>'☒ 不存在','wzl'=>'✎ 无资料','jzc'=>'✖ 禁止词','dyc'=>'☮ 地域词']
                    );
                }
                //完成时间
                if(in_array($this->source_id,['a1',1]))
                {
                    $selector->select('updated_at', '完成时间：', ['今天', '昨天','2天前','3天前','4天前'], function ($query, $value) {
                        $t = [
                            ['whereBetween','updated_at',[Carbon::today(),Carbon::now()]],
                            ['whereBetween','updated_at',[Carbon::today()->subDays(1),Carbon::today()->subDays(0)]],
                            ['whereBetween','updated_at',[Carbon::today()->subDays(2),Carbon::today()->subDays(1)]],
                            ['whereBetween','updated_at',[Carbon::today()->subDays(3),Carbon::today()->subDays(2)]],
                            ['whereBetween','updated_at',[Carbon::today()->subDays(4),Carbon::today()->subDays(3)]],
                        ];

                        $value = current($value);
                        //$query->whereBetween('price', $t[$value]);
                        $r=$t[$value][0];
                        $query->$r($t[$value][1],$t[$value][2]);
                    });
                }

            });

        });

    }

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
            $show->field('user_name');
            $show->field('user_id');
            $show->field('state');
            $show->field('untype');
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
            $form->text('user_name');
            $form->text('user_id');
            $form->select('state')->options([
                -1 => '未处理',
                0 => '废弃',
                1 => '完成',
            ])->default(1);
            $form->text('untype');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
