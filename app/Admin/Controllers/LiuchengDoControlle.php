<?php

namespace App\Admin\Controllers;
use App\Models\Liuchengku;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Carbon\Carbon;
//use App\Admin\Actions\Post\GetLc;
//use App\Admin\Actions\Post\DoLc;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;
use App\Admin\Actions\Grid\RowAction\GetlcAction;
use App\Admin\Grid\Displayers\RowActions;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Support\JavaScript;
class LiuchengDoControlle extends AdminController
{

    protected  $title='加盟流程库';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Liuchengku(), function (Grid $grid) {
            $grid->withBorder();
			$grid->model()->where('is_make',1);
            $grid->column('id')->width('5%')->sortable();
			$grid->column('user_id','用户名') ->display(function ($user_id) {
				if($user_id)
				{
				return Admin::user()->find($user_id)->name;
				}
			})->width('5%');
            $grid->column('brand','品牌名称')->width('5%');
            $grid->column('retype','小分类')->width('5%');
            $grid->column('type','大分类')->width('5%');

           //$grid->column('jmlc','加盟流程')->width('50%');
            //$grid->column('updated_at')->sortable();
			$grid->filter(function (Grid\Filter $filter)
			{
				$filter->panel();
				$filter->equal('id')->width(3);
				if(Admin::user()->isRole('administrator') && in_array($this->source_id,[3,4]))
				{
					$filter->equal('user_id','发布者')->select(Liuchengku::get_user('jmlcs','user_id'))->width(3);
				}
			});
            //快速搜索
            $grid->quickSearch('jmys','type','retype','jmzc');
            //禁用
			$grid->disableBatchDelete();//批量操作
            $grid->disableViewButton();
			$grid->disableDeleteButton();
			$grid->disableEditButton();
			$grid->enableDialogCreate();
			$grid->setDialogFormDimensions('850px', '700px');
			//禁用导出
			//$grid->export()->disableExportAll();
			$grid->showQuickEditButton();
            //分页
            $grid->paginate(30);
            //$grid->showBatchDelete();
            //$grid->enableDialogCreate();
            $grid->showQuickEditButton();

			//批量处理
            //$grid->batchActions(function (Grid\Tools\BatchActions $batch) {
               // $batch->add(new DoLc(Liuchengku::class));
            //});



		//列表筛选
            $grid->header(function () {
                $tab = Tab::make();

                $tab->addLink('加盟优势', '?source_id=0',$this->source_id==0 ? true : false);
                $tab->addLink('加盟支持', '?source_id=2',$this->source_id==2 ? true : false);
                $tab->addLink('加盟流程', '?source_id=1',$this->source_id==1? true : false);
				if(Admin::user()->isRole('administrator'))
				 {
					$tab->addLink('领取情况', '?source_id=3',$this->source_id==3 ? true : false);
					$tab->addLink('导出情况', '?source_id=4',$this->source_id==4 ? true : false);
				}

                return $tab;
            });
            if ($this->source_id == 1)
            {
				 $grid->column('jmlc','加盟流程')->width('50%')->display(function ($jmlc) {
					$jmlc= Liuchengku::cutstr_html($jmlc,$this->brand);
					$lc=Liuchengku::find($this->id);
					$lc->jmlc=$jmlc;
					$lc->save();
                   return 	$jmlc;
				 })->editable(true);
				 $grid->model()->where('user_id',Admin::user()->id)->whereNull('lc_do');
				 //导出
             $titles = ['jmlc'=>'加盟流程',];
             $grid->export($titles)->rows(function (array $rows) {
						foreach ($rows as $index => &$row) {
							$row['jmlc']=Liuchengku::cutstr_html($row['jmlc'],$row['brand']);
							$id=$row['id'];
							$lc=Liuchengku::find($id);
							$lc->lc_do=1;
							$lc->save();
						}
						return $rows;
					});

					//$grid->actions(function (RowActions $actions) {
             //$actions->append(new GetlcAction('🔒完成','lc_do'));

            //});

            }
            elseif ($this->source_id == 0)
            {
                $grid->column('jmys','加盟优势')->width('50%')->display(function ($jmys) {
                    $jmys= Liuchengku::cutstr_html($jmys,$this->brand);
                    $ys=Liuchengku::find($this->id);
                    $ys->jmys=$jmys;
                    $ys->save();
                    $jmys_pp=Liuchengku::pp_html($jmys);
                    return 	$jmys_pp;
                })->editable(true);

				$grid->model()->where('user_id',Admin::user()->id)->whereNotNull('jmys')->whereNull('ys_do');
				//导出
             $titles = ['brand'=>'品牌名称','jmys'=>'加盟优势',];
             $grid->export($titles)->rows(function (array $rows) {
						foreach ($rows as $index => &$row) {
							$row['jmys']=str_replace($row['brand'],'{}',$row['jmys'])."####";
							$id=$row['id'];
							$lc=Liuchengku::find($id);
							$lc->ys_do=1;
							$lc->save();
						}
						return $rows;
					});
				$grid->actions(function (RowActions $actions) {
				$actions->append(new GetlcAction('🔨已完成','ys_do'));
				});
            }
            elseif ($this->source_id == 2)
            {
                $grid->column('jmzc','加盟支持')->width('50%')->display(function ($jmzc) {
                    $jmzc= Liuchengku::cutstr_html($jmzc,$this->brand);
                    $zc=Liuchengku::find($this->id);
                    $zc->jmzc=$jmzc;
                    $zc->save();
                    $jmzc_pp=Liuchengku::pp_html($jmzc);
                    return 	$jmzc_pp;
                });
				$grid->model()->where('user_id',Admin::user()->id)->whereNotNull('jmzc')->whereNull('zc_do');
				$titles = ['brand'=>'品牌名称','jmzc'=>'加盟支持',];
				$grid->export($titles)->rows(function (array $rows) {
						foreach ($rows as $index => &$row) {
							$row['jmzc']=str_replace($row['brand'],'{}',$row['jmzc'])."####";
							$id=$row['id'];
							$lc=Liuchengku::find($id);
							$lc->zc_do=1;
							$lc->save();
						}
						return $rows;
					});
					$grid->actions(function (RowActions $actions) {
					$actions->append(new GetlcAction('⚒️已完成','zc_do'));
					});
            }
			 elseif ($this->source_id == 3)
			 {
				$grid->column('jmys','加盟优势')->width('50%');
				$grid->model()->whereNull('ys_do')->whereNotNull('jmys')->latest();
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

			 }
			elseif ($this->source_id == 4)
			 {
				$grid->column('jmys','加盟优势')->width('50%');
				$grid->model()->where('ys_do',1)->latest();
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
            $show->field('url');
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
			$form->text('brand','品牌名称')->required();
			$form->tab('加盟流程', function (Form $form) {
				  $form->textarea('jmlc','加盟流程')->rows(12);
				 /* $form->editor('jmlc','加盟流程')->options([
					//'toolbar' => ['undo redo | styleselect | bold italic | link image',],
					'toolbar' => [],
				]); */
				})->tab('加盟支持', function (Form $form) {
				 $form->editor('jmzc','加盟支持');
				})->tab('加盟优势', function (Form $form) {
				 $form->editor('jmys','加盟优势');
				});
            //$form->text('type');
            //$form->text('retype');
			//$form->text('is_make');
			//$form->text('user_id');
            $form->hidden('user_id');
			$form->hidden('is_make');
			$form->display('created_at');
            $form->display('updated_at');
            $form->saving(function (Form $form) {
                if ($form->isCreating()) {
                    $form->user_id=Admin::user()->id;
					$form->is_make=1;
					}
                });
        });
    }
}
