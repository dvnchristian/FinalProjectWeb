<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/room', "RoomController@registerRoom");
Route::get('/room', "RoomController@allRoom");
Route::get('/room/{roomID}', "RoomController@findRoom");
Route::delete('/room/{roomID}', "RoomController@destroyRoom");
Route::put('/room/{roomID}', "RoomController@updateviewRoom");

Route::post('/booking', "BookingController@registerBooking");
Route::get('/booking', "BookingController@allBooking");
Route::get('/booking/{bookingID}', "BookingController@findBooking");
Route::delete('/booking/{bookingID}', "BookingController@destroyBooking");
Route::put('/booking/{bookingID}', "BookingController@updateviewBooking");

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::post('searchRoom', "RoomController@searchRoom");

Route::group(['middleware' => ['jwt.auth']], function()
{
    Route::post('booknow', 'AuthController@setBooking');
    Route::get('user', 'AuthController@userAcc');
    Route::get('logout', 'AuthController@logout');
    Route::get('booklist', 'AuthController@booklist');
    Route::put('editProfile', 'AuthController@editProfile');
    Route::post('bookingitinerary', "AuthController@bookingitinerary");

});
