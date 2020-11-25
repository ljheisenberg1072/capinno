<?php

namespace App\Admin\Controllers;

use App\Models\Campaign;
use App\Models\CampaignStage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CampaignStagesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '比赛阶段节点';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CampaignStage());

        $grid->model()->orderByDesc('created_at')->orderByDesc('id');
        $grid->column('id', 'ID');
        $grid->column('stage_name', '赛事阶段名称');
        $grid->column('campaign_id', '大赛名称')->display(function ($id) {
            return Campaign::query()->where('id', $id)->value('campaign_name');
        })->label();
        $grid->column('need_submission', '是否提交作品')->bool();
        $grid->column('online_offline', '线上/线下')->display(function ($value) {
            return $value == 1 ? '线上' : '线下';
        })->label([ 1 => 'success', 0 => 'danger']);
        $grid->column('submission_time', '作品提交时间')->display(function () {
            if ($this->submission_start_time && $this->submission_end_time) {
                return $this->submission_start_time.' 到 '.$this->submission_end_time;
            }
        });
        $grid->column('need_judgement', '是否需要评审')->display(function ($value) {
            return $value == 1 ? '线上' : ($value == 2 ? '线下' : '否');
        })->label([0 => 'primary', 1 => 'success', 2 => 'danger']);
        $grid->column('judgement_date', '评审时间')->display(function () {
            if ($this->judgement_start_date && $this->judgement_end_date) {
                return $this->judgement_start_date.' 到 '.$this->judgement_end_date;
            }
        });
        $grid->column('result_date', '结果公布时间')->display(function () {
            if ($this->result_start_date && $this->result_end_date) {
                return $this->result_start_date.' 到 '.$this->result_end_date;
            }
        });
        $grid->column('result_undetermined', '是否待定')->using([1 => '是', 0 => '否'])->dot([1 => 'danger', 0 => 'success']);
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
            $filter->like('stage_name', '赛事阶段名称');
            $filter->equal('campaign_id', '大赛名称')->select(function () {
                return Campaign::query()->pluck('campaign_name', 'id');
            });
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
        $form = new Form(new CampaignStage());

        $form->text('stage_name', '赛事阶段名称')->rules('required|max:255');
        $form->select('need_submission', '是否需要提交作品')->options([1 => '是', 0 => '否'])->rules('required')->default(1);
        $form->select('online_offline', '线上还是线下')->options([1 => '线上', 0 => '线下'])->default(1)->help('如果”是否需要提交作品“选择为"否"，则此项忽略');
        $form->datetimeRange('submission_start_time', 'submission_end_time', '提交作品时间')->rules('nullable')->help('如果“是否需要提交作品”选择为"否"，则此项忽略');
        $form->select('need_judgement', '是否需要评审')->options([0 => '否', 1 => '线上', 2 => '线下'])->rules('required')->default(1);
        $form->dateRange('judgement_start_date', 'judgement_end_date', '评审时间')->rules('nullable')->help('如果”是否需要评审“选择为"否"，则此项忽略');
        $form->dateRange('result_start_date', 'result_end_date', '结果公布时间')->rules('nullable')->help('如果“结果公布时间待定”为“待定”，则此项忽略');
        $form->radio('result_undetermined', '结果公布时间待定')->options([0 => '否', 1 => '是'])->default(0)->help('默认否');
        $form->textarea('attention', '注意事项')->rules('nullable');

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
