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

class HotelModelController extends Controller
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

            $content->header('Hotel');
            $content->description('Add, Edit & Delete Hotel');

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

            $content->header('Hotel');
            $content->description('Edit Hotel');

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

            $content->header('Hotel');
            $content->description('Add Hotel');

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
        return Admin::grid(HotelModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('hotelName', 'hotelLocation', 'hotelAddress',
            'hotelPhone', 'hotelStar','hotelImage', 'description');

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
        return Admin::form(HotelModel::class, function (Form $form)
        {
            $form->display('id', 'ID');
            $form->text('hotelName');
            $form->text('hotelLocation');
            $form->text('hotelAddress');
            $form->text('hotelPhone');
            $form->text('hotelStar');
            $form->text('hotelImage');
            $form->text('description');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
