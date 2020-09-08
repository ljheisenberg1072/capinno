<?php

namespace App\Admin\Controllers;

use App\Models\Carousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarouselsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '轮播图列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel());

        $grid->column('id', 'ID')->sortable();
        $grid->column('image', '缩略图')->image(env('APP_URL').'/storage', 150, 60);
        $grid->column('is_show', '是否展示')->bool();
        $grid->column('order', '排序')->editable();
        $grid->column('view_count', '浏览量')->editable();
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

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
        $show = new Show(Carousel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('image', '轮播图')->image();
        $show->field('title', '标题');
        $show->field('link', '链接');
        $show->field('is_show', '是否展示');
        $show->field('order', '排序');
        $show->field('view_count', '浏览量');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Carousel());

        $form->image('image', '轮播图')->rules('required|image|dimensions:min_width=1800')->resize(1920, 600)->uniqueName()->move("uploads/images/carousels/".date("Y/m/d", time()))->help('推荐尺寸：1920px * 600px');
        $form->text('title', '标题');
        $form->text('link', '链接');
        $form->radio('is_show', '是否展示')->options([1=>'是', 0=>'否'])->default(1);
        $form->text('order', '排序')->rules('numeric|min:0')->default(0);
        $form->text('view_count', '浏览量')->rules('numeric|min:0')->default(0);

        return $form;
    }
}
