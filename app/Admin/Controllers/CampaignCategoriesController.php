<?php

namespace App\Admin\Controllers;

use App\Models\Campaign;
use App\Models\CampaignCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CampaignCategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '比赛类目列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CampaignCategory());

        $grid->model()->orderByDesc('created_at')->orderByDesc('id');
        $grid->column('id', 'ID')->sortable();
        $grid->column('campaign_id', '大赛名称')->display(function ($id) {
            return Campaign::query()->where('id', $id)->value('campaign_name');
        })->label();
        $grid->column('category_name', '比赛类目名称');
        $grid->column('on_show', '前台显示')->bool();
        $grid->column('display_order', '排序')->sortable()->editable();
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
            //  去掉删除
            $actions->disableDelete();
        });

        //  去掉新增按钮
        $grid->disableCreateButton();

        //  去掉批量操作
        $grid->disableBatchActions();

        $grid->filter(function($filter) {
            //  去掉默认的id过滤器
            $filter->disableIdFilter();
            //  添加字段过滤器
            $filter->equal('campaign_id', '大赛名称')->select(function () {
                return Campaign::query()->pluck('campaign_name', 'id');
            });
            $filter->like('category_name', '比赛类目名称');
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CampaignCategory());

        $form->text('category_name', '比赛类目名称')->rules('required|max:255');
        $form->radio('on_show', '前台展示')->options([1 => '是', 0 => '否'])->default(1);
        $form->text('display_order', '排序')->rules('required|numeric')->default(1000);

        $form->tools(function (Form\Tools $tools) {
            //  去掉查看按钮
            $tools->disableView();
            //  去掉删除按钮
            $tools->disableDelete();
        });
        $form->footer(function ($footer) {
            //  去掉查看 checkbox
            $footer->disableViewCheck();
        });

        return $form;
    }
}
