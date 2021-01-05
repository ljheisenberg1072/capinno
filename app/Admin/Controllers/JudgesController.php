<?php

namespace App\Admin\Controllers;

use App\Models\Judge;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class JudgesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '评委管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Judge());

        $grid->column('id', 'ID');
        $grid->column('name', '姓名');
        $grid->column('company', '就职单位');
        $grid->column('title', '头衔');
        $grid->column('on_show', '前台展示')->bool();
        $grid->column('display_order', '排序')->editable()->sortable();
        $grid->column('review_count', '浏览量')->label()->sortable();
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
            //  去掉删除
            $actions->disableDelete();
        });

        //  禁用创建按钮，只通过用户关联创建
        $grid->disableCreateButton();

        //  去掉批量操作
        $grid->disableBatchActions();

        $grid->filter(function($filter) {
            //  去掉默认的id过滤器
            $filter->disableIdFilter();
            //  添加字段过滤器
            $filter->like('name', '姓名');
            $filter->like('company', '就职单位');
            $filter->like('title', '头衔');
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
        $form = new Form(new Judge());

        $form->image('avatar', '头像')->rules('required|image|dimensions:min_width=300')->resize(500, null, function ($constraint) {
            //  设定最大宽度，高度等比例缩放
            $constraint->aspectRatio();
            //  防止裁剪时图片尺寸变大
            $constraint->upsize();
        })->uniqueName()->move("uploads/judges/" . date("Y/m/d", time()))->help('推荐尺寸：500px * 500px，宽度不能小于300px');
        $form->text('name', '姓名')->rules('required|max:255');
        $form->text('company', '就职单位')->rules('required|max:255');
        $form->text('title', '头衔')->rules('required|max:255');
        $form->textarea('introduction', '简介')->rules('nullable');
        $form->radio('on_show', '前台展示')->options([1 => '是', 0 => '否'])->default(1);
        $form->text('display_order', '排序')->default(1000);
        $form->text('review_count', '浏览量')->default(0);

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
