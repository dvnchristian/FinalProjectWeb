<?php

namespace App\Admin\Controllers;

use App\Model\BookingModel;
use App\Model\UserAccountModel;
use App\Model\RoomModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class BookingModelController extends Controller
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

            $content->header('Booking');
            $content->description('Add, Edit & Delete Booking');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Booking');
            $content->description('Edit Booking');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Booking');
            $content->description('Add Booking');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(BookingModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns(
              'checkInDate', 'checkOutDate',
              'comment', 'rating', 'userID', 'roomID');

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
        return Admin::form(BookingModel::class, function (Form $form) {

          $form->display('id', 'ID');
          $form->date('checkInDate');
          $form->date('checkOutDate');
          $form->text('comment');
          $form->text('rating');
          $form->select('userID')->options(UserAccountModel::all()->pluck('name', 'id'));
          $form->select('roomID')->options(RoomModel::all()->pluck('id', 'id'));

          $form->display('created_at', 'Created At');
          $form->display('updated_at', 'Updated At');
        });
    }
}
