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
Route::get('/searchRoom', "RoomController@searchRoom");

Route::get('/booking/{bookingID}', "BookingController@findBooking");
Route::delete('/booking/{bookingID}', "BookingController@destroyBooking");
Route::put('/booking/{bookingID}', "BookingController@updateviewBooking");
Route::post('/roomlist', "BookingController@unbookedRoom");

Route::post('/bookedRoom', "BookedRoomController@registerBookedRoom");
Route::get('/bookedRoom', "BookedRoomController@allbookedRoom");
Route::get('/bookedRoom/{id}', "BookedRoomController@findBookedRoom");
Route::delete('/bookedRoom/{id}', "BookedRoomController@destroyBookedRoom");
Route::put('/bookedRoom/{id}', "BookedRoomController@updateviewBookedRoom");

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function()
{
    Route::get('logout', 'AuthController@logout');
    Route::put('editProfile', 'AuthController@editProfile');
});

Route::post('/validateCCNumber', 'UserAccountController@validateCCNumber');
Route::post('/validateExpireDate', 'UserAccountController@validateExpireDate');
Route::post('/validateCVV', 'UserAccountController@validateCVV');
