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

        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '大赛名称');
        $grid->column('on_hold', '正在举行')->bool();
        $grid->column('created_at', '创建时间');

        //  关闭行删除
        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });

        //  去掉批量操作
        $grid->disableBatchActions();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Campaign::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('on_hold', __('On hold'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Campaign());

        $form->text('title', '大赛名称')->rules('required|max:255');
        $form->radio('on_hold', '正在举行')->options([1=>'是', 0=>'否'])->default(1);

        return $form;
    }
}
