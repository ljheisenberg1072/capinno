<?php

namespace App\Admin\Controllers;

use App\Models\NewsArticle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsArticlesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '新闻动态列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsArticle());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'));
        $grid->column('title', __('Title'));
        $grid->column('introduce', __('Introduce'));
        $grid->column('description', __('Description'));
        $grid->column('image', __('Image'));
        $grid->column('order', __('Order'));
        $grid->column('view_count', __('View count'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(NewsArticle::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', __('Title'));
        $show->field('introduce', __('Introduce'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('order', __('Order'));
        $show->field('view_count', __('View count'));
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
        $form = new Form(new NewsArticle());

        $form->number('category_id', __('Category id'));
        $form->text('title', __('Title'));
        $form->text('introduce', __('Introduce'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->number('order', __('Order'));
        $form->number('view_count', __('View count'));

        return $form;
    }
}
