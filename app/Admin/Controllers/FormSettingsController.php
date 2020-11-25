<?php

namespace App\Admin\Controllers;

use App\Models\Campaign;
use App\Models\CampaignStage;
use App\Models\FileSize;
use App\Models\FileType;
use App\Models\FormSetting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FormSettingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '表单设置';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FormSetting());
        $stage = new CampaignStage();

        $grid->model()->orderByDesc('created_at')->orderByDesc('id');
        $grid->column('id', 'ID');
        $grid->column('campaign_name', '大赛名称')->display(function () use ($stage) {
            $campaignId = CampaignStage::query()->where('id', $this->campaign_stage_id)->value('campaign_id');
            return Campaign::query()->where('id', $campaignId)->value('campaign_name');
        });
        $grid->column('campaign_stage_id', '比赛阶段')->display(function ($id) {
            return CampaignStage::query()->where('id', $id)->value('stage_name');
        })->label();
        $grid->column('works_name', '作品名称');
        $grid->column('works_description', '作品说明');
        $grid->column('attention', '注意事项');
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
            //  去掉删除
            $actions->disableDelete();
        });

        //  去掉批量操作
        $grid->disableBatchActions();

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FormSetting());

        $form->select('campaign_id', '大赛名称')->options(function () {
            return Campaign::all()->pluck('campaign_name', 'id');
        })->load('campaign_stage_id', '/api/stage');
        if ($form->isCreating()) {
            $form->select('campaign_stage_id', '比赛阶段');
        }else {
            $form->select('campaign_stage_id', '比赛阶段')->options(function ($id) {
                $campaignStage = CampaignStage::findOrFail($id);
                return [$campaignStage->id => $campaignStage->stage_name];
            });
        }

        $form->text('works_name', '作品名称')->rules('required|max:255')->default('作品名称')->help('如无修改，默认填写”作品名称“');
        $form->text('works_description', '作品说明')->rules('required|max:255')->help('如无修改，默认填写"作品说明"');
        $form->textarea('attention', '注意事项')->rules('nullable')->help('填写具体的注意事项，可为空');
        $form->hasMany('files', '作品提交文档', function (Form\NestedForm $form) {
            $form->text('file_name', '文档名称');
            $form->select('file_type_id', '文档格式')->options(function () {
                return FileType::query()->pluck('type_name', 'id');
            });
            $form->select('file_size_id', '文档大小')->options(function () {
                return FileSize::query()->pluck('file_size_maximum', 'id');
            })->help('单位：M');
            $form->radio('is_required', '是否必填')->options([1 => '是', 0 => '否'])->default(1);
        });
        $form->ignore('campaign_id');

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
