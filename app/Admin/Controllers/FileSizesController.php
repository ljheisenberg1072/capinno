<?php

namespace App\Admin\Controllers;

use App\Models\FileSize;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FileSizesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文件大小';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FileSize());

        $grid->model()->orderByDesc('created_at')->orderByDesc('id');
        $grid->column('id', 'ID');
        $grid->column('file_size_maximum', '文件最大值')->display(function ($value) {
            return $value.'M';
        });
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
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
        $form = new Form(new FileSize());

        $form->text('file_size_maximum', '文件最大值')->rules('required|numeric')->help('单位M');

        $form->tools(function (Form\Tools $tools) {
            //  去掉查看按钮
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            //  去掉查看 checkbox
            $footer->disableViewCheck();
        });

        return $form;
    }
}
