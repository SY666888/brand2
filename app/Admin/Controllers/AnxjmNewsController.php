<?php

namespace App\Admin\Controllers;
use App\Models\AnxjmNew;
use App\Models\Brand;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Widgets\Card;
use Carbon\Carbon;
use App\Admin\Actions\Grid\RowAction\BrandOperationAction;
use App\Admin\Actions\Grid\RowAction\CompleteAction;
use App\Admin\Actions\Grid\RowAction\HuifuAction;
use App\Admin\Grid\Displayers\RowActions;
use Dcat\Admin\Http\Controllers\AdminController;


class AnxjmNewsController extends AdminController
{
	 protected  $title='安心加盟资讯处理';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AnxjmNew(), function (Grid $grid) {
            $grid->model()->with(['brand']);
            $grid->column('id')->sortable();
            $grid->column('brand.id','品牌id')->sortable();
            $grid->column('brand.brandname','品牌名称')->copyable();
            $grid->column('brand_username','负责人');
            $grid->column('state','状态')->using([0 => '废弃', 1 => '完成', -1 => '未处理'])->label([
                'default' => 'primary', // 设置默认颜色，不设置则默认为 default
                0 => 'dark60',
                1 => 'primary',
                -1 => 'warning',
            ]);
            if ($this->source_id ==2 || $this->source_id=='a3')
            {
                $grid->column('untype')->using(['cf'=>'✤ 已发布','bcz'=>'☒ 不存在','wzl'=>'✎ 无资料','jzc'=>'✖ 禁止词'])
                    /*->dot([
                        'default' => 'primary', // 设置默认颜色，不设置则默认为 default
                        'cf' => '#FF4040',
                        'bcz' => '#EE8262',
                        'wzl' => '#FF7F24',
                        'jzc' =>'#99cc66',
                    ])*/;
            }
           if(admin_setting('keywords_wajue')==1 && Admin::user()->can('keywords_wajue'))
           {
               $grid->column('important','长尾词')
                   ->display('查看') // 设置按钮名称
                   ->modal(function ($modal) {
                       // 设置弹窗标题
                       $brand=Brand::find($this->brand_id);
                       $brandname=$brand->brandname;
                       $modal->title('长尾词挖掘');
                       $card = new Card(null, view('xiangqing.keywords', compact('brandname')));
                       return "<div style='padding:10px 10px 0'>$card</div>";
                   });
           }
            $grid->column('brand.important','百度下拉词个数');
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
            $grid->column('created_at')->display(function ($created_at) {
                /*$a=(new Carbon($created_at))->dayOfWeek;
                if($a==0)
                    $created_at='星期日';
                elseif ($a==1)
                    $created_at='星期一';
                elseif ($a==2)
                    $created_at='星期二';
                elseif ($a==3)
                    $created_at='星期三';
                elseif ($a==4)
                    $created_at='星期四';
                elseif ($a==5)
                    $created_at='星期五';
                elseif ($a==6)
                    $created_at='星期六';*/
                return  $created_at;

            });

            if (Admin::user()->isRole('administrator'))
            {
                $grid->filter(function (Grid\Filter $filter) {
                    $filter->panel();
                    $filter->equal('brand_userid','发布者')->select(AnxjmNew::pluck('brand_username', 'brand_userid'))->width(3);
                });
            }
            //快速搜索
            $grid->quickSearch('brand.brandname','brand_username');
            //禁用
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            //行操作按钮
            $grid->actions(function (RowActions $actions) {
                    if($this->state==0)
                    {
                        $actions->append(new HuifuAction(AnxjmNew::class));
                    }
                    elseif($this->state==-1)
                    {
                        $actions->append(new BrandOperationAction(AnxjmNew::class));
                        $actions->append(new CompleteAction(AnxjmNew::class));
                    }

            });

            $grid->header(function () {
                $tab = Tab::make();
                if(Admin::user()->isRole('administrator'))
                {
                    $tab->addLink('未处理的', '?source_id=a1',$this->source_id=='a1'? true : false);
                    $tab->addLink('已完成的', '?source_id=a2',$this->source_id=='a2' ? true : false);
                    $tab->addLink('无效的', '?source_id=a3',$this->source_id=='a3'? true : false);
                }
                else{
                    $tab->addLink('未处理', '?source_id=0',$this->source_id==0? true : false);
                    $tab->addLink('已完成', '?source_id=1',$this->source_id==1? true : false);
                    $tab->addLink('失效', '?source_id=2',$this->source_id==2? true : false);
                }

                return $tab;
            });

            if ($this->source_id =='a1') {
                $grid->model()->where('state',-1)->latest();
            }
            elseif ($this->source_id =='a2'){
                $grid->model()->where('state',1)->latest();
            }
            elseif ($this->source_id =='a3'){
                $grid->model()->where('state',0)->latest();
            }

            //判断2
            elseif ($this->source_id ==0) {
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',-1)->latest();
            }
            elseif ($this->source_id ==1){
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',1)->latest();
            }
            elseif ($this->source_id ==2){
                $grid->model()->where('brand_userid',Admin::user()->id)->where('state',0)->latest();
            }
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
        return Show::make($id, new AnxjmNew(), function (Show $show) {
            $show->field('id');
            $show->field('brand_id');
            $show->field('brand_username');
            $show->field('brand_userid');
            $show->field('state');
            $show->field('untype');
            $show->field('important');
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
        return Form::make(new AnxjmNew(), function (Form $form) {
            $form->display('id');
            $form->text('brand_id');
            $form->text('brand_username');
            $form->text('brand_userid');
            $form->select('state')->options([
                -1 => '未处理',
                0 => '废弃',
                1 => '完成',
            ])->default(1);
            $form->text('untype');
            $form->text('important');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
