<?php

namespace App\Admin\Controllers;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Str;

class NewsArticlesController extends Controller
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
            ->header('新闻动态列表')
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
            ->header('编辑新闻动态')
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
            ->header('创建新闻动态')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsArticle);

        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
        $grid->category_id('分类ID');
        $grid->title('文章标题');
        $grid->order('排序');
        $grid->view_count('浏览量');
        $grid->created_at('创建时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
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
        $form = new Form(new NewsArticle);

        $categories = NewsCategory::query()->pluck('name','id')->toArray();

        $form->text('title', '文章标题')->rules('required');
        $form->image('image', '封面图片')->rules('required|image')->help('推荐封面图片尺寸大小：350px * 200px')->name(function ($file) {
            return time().Str::random().".".$file->guessExtension();
        })->move("uploads/images/news_articles/".date("Ym/d", time()));;
        $form->select('category_id', '文章分类')->options($categories)->rules('required');
        $form->textarea('introduce', '文章简介')->rules('max:255');
        $form->editor('description', '文章详情')->rules('required');
        $form->text('order', '排序')->default('0');
        $form->text('view_count', '浏览量')->default('0');

        return $form;
    }
}
