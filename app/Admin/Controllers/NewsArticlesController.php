<?php

namespace App\Admin\Controllers;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class NewsArticlesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '新闻列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsArticle());

        $grid->model()->orderByDesc('id');

        $grid->column('id', 'ID')->sortable();
        $grid->column('category_id', '分类')->display(function ($id) {
            return NewsCategory::query()->where('id', $id)->value('name');
        });
        $grid->column('title', '标题');
        $grid->column('on_show', '发布状态')->bool();
        $grid->column('display_order', '排序')->editable()->sortable();
        $grid->column('review_count', '阅读量')->label();
        $grid->column('created_at', '创建时间');

        $grid->actions(function ($actions) {
            //  去掉查看
            $actions->disableView();
        });

        //  去掉批量操作
        $grid->disableBatchActions();

        $grid->filter(function($filter) {
            //  去掉默认的id过滤器
            $filter->disableIdFilter();
            //  添加字段过滤器
            $filter->equal('category_id', '分类')->select(NewsCategory::all()->pluck('name', 'id'));
            $filter->like('title', '标题');
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
        $form = new Form(new NewsArticle());

        $form->text('title', '标题')->rules('required|max:255');
        $form->select('category_id', '分类')->options(NewsCategory::all()->pluck('name', 'id'))->rules('required');
        $form->textarea('excerpt', '简介')->rules('nullable');
        $form->image('cover', '封面')->rules('required|image|dimensions:min_width=300')->resize(600, 400)->uniqueName()->move("uploads/cover/" . date("Y/m/d", time()))->help('推荐尺寸：600px * 400px，宽度不能小于300px');
        $form->UEditor('content', '内容')->rules('required');
        $form->radio('on_show', '发布状态')->options([1 => '已发布', 0 => '未发布'])->default(1);
        $form->text('display_order', '排序')->default(1000);
        $form->text('review_count', '阅读量')->default(0);

        $form->tools(function (Form\Tools $tools) {
            //  去掉查看按钮
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            //  去掉查看 checkbox
            $footer->disableViewCheck();
        });

        $form->saving(function (Form $form) {
            if (!$form->excerpt) {
                $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($form->content)));
                $form->excerpt = Str::limit($excerpt, 200);
            }
        });

        return $form;
    }
}
