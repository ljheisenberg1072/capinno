<?php

namespace App\Admin\Controllers;

use App\Models\Campaign;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CampaignsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '大赛列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Campaign());

        $grid->model()->orderByDesc('created_at');
        $grid->column('id', 'ID')->sortable();
        $grid->column('campaign_name', '大赛名称');
        $grid->column('cover', '大赛封面')->image(env('APP_URL').'/storage', 200, 100);
        $grid->column('upper_limit', '参赛总人数上限');
        $grid->column('on_hold', '正在举行')->bool();
        $grid->column('is_top', '是否置顶')->bool();
        $grid->column('display_order', '排序')->sortable();
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
            //  去掉删除
            $actions->disableDelete();
        });

        //  去掉批量操作
        $grid->disableBatchActions();

        $grid->filter(function($filter) {
            //  去掉默认的id过滤器
            $filter->disableIdFilter();
            //  添加字段过滤器
            $filter->like('campaign_name', '大赛名称');
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
        $form = new Form(new Campaign());

        $form->text('campaign_name', '大赛名称')->rules('required|max:255');
        $form->image('cover', '大赛封面')->rules('required|image|dimensions:min_width=500')->resize(800, null, function ($constraint) {
            //  设定最大宽度，高度等比例缩放
            $constraint->aspectRatio();
            //  防止裁剪时图片尺寸变大
            $constraint->upsize();
        })->uniqueName()->move("uploads/campaign/cover/" . date("Y/m/d", time()))->help('宽度不能小于500px');
        $form->textarea('introduction', '大赛简介')->rules('required|max:255')->help('注意：限制250字以内');
        $form->text('upper_limit', '参赛总人数上限')->rules('required|numeric|min:2|max:10')->help('注意：最少2人最多10人，建议设置8人');
        $form->radio('on_hold', '正在举行')->options([1=>'是', 0=>'否'])->default(1);
        $form->radio('is_top', '是否置顶')->options([1=>'是', 0=>'否'])->default(0);
        $form->text('display_order', '排序')->default(1000);
        $form->hasMany('categories', '比赛类目列表', function (Form\NestedForm $form) {
            $form->text('category_name', '比赛类目名称')->rules('required|max:255');
        });
        $form->hasMany('stages', '比赛阶段节点', function (Form\NestedForm $form) {
           $form->text('stage_name', '赛事阶段名称')->rules('required|max:255');
           $form->select('need_submission', '是否需要提交作品')->options([1 => '是', 0 => '否'])->rules('required')->default(1);
           $form->select('online_offline', '线上还是线下')->options([1 => '线上', 0 => '线下'])->default(1)->help('如果”是否需要提交作品“选择为"否"，则此项忽略');
           $form->datetimeRange('submission_start_time', 'submission_end_time', '提交作品时间')->rules('nullable')->help('如果“是否需要提交作品”选择为"否"，则此项忽略');
           $form->select('need_judgement', '是否需要评审')->options([0 => '否', 1 => '线上', 2 => '线下'])->rules('required')->default(1);
           $form->dateRange('judgement_start_date', 'judgement_end_date', '评审时间')->rules('nullable')->help('如果”是否需要评审“选择为"否"，则此项忽略');
           $form->dateRange('result_start_date', 'result_end_date', '结果公布时间')->rules('nullable')->help('如果“结果公布时间待定”为“待定”，则此项忽略');
           $form->radio('result_undetermined', '结果公布时间待定')->options([0 => '否', 1 => '是'])->default(0)->help('默认否');
           $form->textarea('attention', '注意事项')->rules('nullable');
        });

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
