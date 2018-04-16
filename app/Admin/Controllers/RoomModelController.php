<?php

namespace App\Admin\Controllers;

use App\Model\RoomModel;
use App\Model\HotelModel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RoomModelController extends Controller
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

            $content->header('Room');
            $content->description('Add, Edit & Delete Room');

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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(RoomModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('roomType','hotelID', 'bedType', 'roomPrice', 'qty');

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
        return Admin::form(RoomModel::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('hotelID')->options(HotelModel::all()->pluck('hotelName', 'id'));
            $form->text('roomType');
            $form->text('bedType');
            $form->text('roomPrice');
            $form->text('qty');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
