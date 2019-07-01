<?php

namespace App\Admin\Controllers;

use App\Models\Carousel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class CarouselsController extends Controller
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
            ->header('轮播图列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
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
            ->header('编辑轮播图')
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
            ->header('新增轮播图')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel);

        //  默认按照创建时间倒序排序
        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
        $grid->title('标题');
        $grid->is_show('是否展示')->display(function($value) {
            return $value ? '是' : '否';
        });
        $grid->order('排序');
        $grid->view_count('浏览量');
        $grid->created_at('创建时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        $grid->tools(function ($tools) {
            //  禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

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

        $show->id('Id');
        $show->image('Image');
        $show->title('Title');
        $show->link('Link');
        $show->is_show('Is show');
        $show->order('Order');
        $show->view_count('View count');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Carousel);

        $form->display('id', 'ID');
        $form->image('image', '轮播图片')->rules('required|image')->help('推荐图片尺寸大小：1100px * 450px')->name(function ($file) {
            return time().Str::random().".".$file->guessExtension();
        })->move("uploads/images/carousels/".date("Ym/d", time()));
        $form->text('title', '标题')->default('');
        $form->text('link', '链接')->default('');
        $form->radio('is_show', '是否展示')->options(['1'=>'是', '0'=>'否'])->default('1');
        $form->text('order', '排序')->rules('required|numeric|min:0')->default('0');
        $form->text('view_count', '浏览量')->rules('required|numeric|min:0')->default('0');

        return $form;
    }
}
