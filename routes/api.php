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

Route::post('/user', "UserAccountController@register");
Route::get('/user', "UserAccountController@all");
Route::get('/user/{userAccountID}', "UserAccountController@find");
Route::delete('/user/{userAccountID}', "UserAccountController@destroy");
Route::put('/user/{userAccountID}', "UserAccountController@updateview");

Route::post('/hotel', "hotelController@registerHotel");
Route::get('/hotel', "hotelController@allHotel");
Route::get('/hotel/{hotelID}', "hotelController@findHotel");
Route::delete('/hotel/{hotelID}', "hotelController@destroyHotel");
Route::put('/hotel/{hotelID}', "hotelController@updateviewHotel");


Route::post('/room', "RoomController@registerRoom");
Route::get('/room', "RoomController@allRoom");
Route::get('/room/{roomID}', "RoomController@findRoom");
Route::delete('/room/{roomID}', "RoomController@destroyRoom");
Route::put('/room/{roomID}', "RoomController@updateviewRoom");
Route::get('/searchRoom', "RoomController@searchRoom");

Route::post('/booking', "BookingController@registerBooking");
Route::get('/booking', "BookingController@allBooking");
Route::get('/booking/{bookingID}', "BookingController@findBooking");
Route::delete('/booking/{bookingID}', "BookingController@destroyBooking");
Route::put('/booking/{bookingID}', "BookingController@updateviewBooking");

Route::post('/bookedRoom', "BookedRoomController@registerBookedRoom");
Route::get('/bookedRoom', "BookedRoomController@allbookedRoom");
Route::get('/bookedRoom/{id}', "BookedRoomController@findBookedRoom");
Route::delete('/bookedRoom/{id}', "BookedRoomController@destroyBookedRoom");
Route::put('/bookedRoom/{id}', "BookedRoomController@updateviewBookedRoom");
Route::get('/testbooked', "BookedRoomController@testfunction");

Route::post('/review', "ReviewController@registerReview");
Route::get('/review', "ReviewController@allReview");
Route::get('/review/{reviewID}', "ReviewController@findReview");
Route::delete('/review/{reviewID}', "ReviewController@destroyReview");
Route::put('/review/{reviewID}', "ReviewController@updateviewReview");

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function()
{
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});

Route::post('bookRoom/{roomID}/{qty}', "BookingController@checkRoomStock");
Route::get('/review', "ReviewController@allReview");
Route::get('/review/{reviewID}', "ReviewController@findReview");
Route::delete('/review/{reviewID}', "ReviewController@destroyReview");
Route::put('/review/{reviewID}', "ReviewController@updateviewReview");

//midtrans Routes
Route::get('/vtweb', 'PagesController@vtweb');
Route::get('/vtdirect', 'PagesController@vtdirect');
Route::post('/vtdirect', 'PagesController@checkout_process');
Route::get('/vt_transaction', 'PagesController@transaction');
Route::post('/vt_transaction', 'PagesController@transaction_process');
Route::post('/vt_notif', 'PagesController@notification');
Route::get('/snap', 'SnapController@snap');
Route::get('/snaptoken', 'SnapController@token');
Route::post('/snapfinish', 'SnapController@finish');
