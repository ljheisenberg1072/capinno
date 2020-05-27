<?php

namespace App\Admin\Controllers;

use App\Models\NewsCategory;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class NewsCategoriesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('新闻动态分类列表')
            ->body($this->grid());
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑新闻动态分类')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建新闻动态分类')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsCategory);

        $grid->id('分类ID');
        $grid->name('分类名称');
        $grid->order('分类排序');
        $grid->created_at('添加时间');
        $grid->updated_at('修改时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
           $tools->batch(function ($batch) {
               $batch->disableDelete();
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
        $form = new Form(new NewsCategory);

        $form->text('name', '分类名称')->rules('required');
        $form->text('order', '分类排序')->rules('required|numeric|min:0')->default('0');

        return $form;
    }
}
