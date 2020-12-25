<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Illuminate\Support\Facades\Hash;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '用户名');
        $grid->column('email', '邮箱');
        $grid->column('grade', '身份')->display(function ($id) {
            switch ($id)
            {
                case 1:
                    $value = '学生';
                    break;
                case 2:
                    $value = '评委';
                    break;
                default:
                    $value = '未知';
            }
            return $value;
        })->label([1 => 'success', 2 => 'danger']);
        $grid->column('email_verified_at', '已验证邮箱')->bool();
        $grid->column('created_at', '注册时间');

        $grid->actions(function ($actions) {
            //  去掉显示查看
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
        $form = new Form(new User());

        $form->text('name', '用户名')->rules('required|string|max:255');
        $form->email('email', '邮箱')->creationRules(['required', 'string', 'email', 'max:255', "unique:users"])->updateRules(['required', 'string', 'email', 'max:255', "unique:users,email,{{id}}"]);
        $form->select('grade', '身份')->rules('required')->options([1 => '学生', 2 => '评委'])->when(2, function (Form $form) {
           $form->hasMany('judges', '评委信息', function (Form\NestedForm $form) {
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
           });
        });

        $form->datetime('email_verified_at', '邮箱验证时间')->default(date('Y-m-d H:i:s'));
        $form->password('password', '密码')->rules(['required', 'string', 'min:8', 'confirmed'])->default(function ($form) {
            return $form->model()->password;
        });
        $form->password('password_confirmation', '确认密码')->rules('required')->default(function ($form) {
            return $form->model()->password;
        });
        $form->ignore('password_confirmation');

        $form->saving(function (Form $form) {
            //  修改密码时，密码进行Hash加密
            if ($form->password && $form->password != $form->model()->password) {
                $form->password = Hash::make($form->password);
            }
        });

        return $form;
    }
}
