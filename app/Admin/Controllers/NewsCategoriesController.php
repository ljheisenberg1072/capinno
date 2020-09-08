<?php

namespace App\Admin\Controllers;

use App\Models\NewsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsCategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '新闻分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsCategory());

        $grid->model()->orderByDesc('id');
        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '分类');
        $grid->column('order', '排序')->editable()->sortable();
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

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
        $form = new Form(new NewsCategory());

        $form->text('name', '分类名称')->rules('required|max:255');
        $form->text('order', '排序')->default(1000);

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
