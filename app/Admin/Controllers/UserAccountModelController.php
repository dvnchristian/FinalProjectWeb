<?php

namespace App\Admin\Controllers;

use App\Model\UserAccountModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserAccountModelController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('User');
            $content->description('Add, Edit & Delete User');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    // public function edit($id)
    // {
    //     return Admin::content(function (Content $content) use ($id) {
    //
    //         $content->header('Users');
    //         $content->description('Edit Users');
    //
    //         $content->body($this->form()->edit($id));
    //     });
    // }

    /**
     * Create interface.
     *
     * @return Content
     */
    // public function create()
    // {
    //     return Admin::content(function (Content $content) {
    //
    //         $content->header('Users');
    //         $content->description('Add Users');
    //
    //         $content->body($this->form());
    //     });
    // }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(UserAccountModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('name', 'email', 'password',
            'phone', 'gender', 'city', 'ccNumber', 'cvv', 'expDate','is_verified');

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(UserAccountModel::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name');
            $form->text('password');
            $form->text('phone');
            $form->text('gender');
            $form->text('city');
            $form->text('ccNumber');
            $form->text('cvv');
            $form->text('expDate');
            $form->text('is_verified');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
