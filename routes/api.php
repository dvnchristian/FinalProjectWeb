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
Route::get('/user/{id}', "UserAccountController@find");
Route::delete('/user/{id}', "UserAccountController@destroy");
Route::put('/user/{id}', "UserAccountController@updateview");

Route::post('/userd', "UserDetailsController@registerUserDetails");
Route::get('/userd', "UserDetailsController@allUserDetails");
Route::get('/userd/{userDetailsID}', "UserDetailsController@findUserDetails");
Route::delete('/userd/{userDetailsID}', "UserDetailsController@destroyUserDetails");
Route::put('/userd/{userDetailsID}', "UserDetailsController@updateviewUserDetails");

Route::post('/hotel', "hotelController@registerHotel");
Route::get('/hotel', "hotelController@allHotel");
Route::get('/hotel/{hotelID}', "hotelController@findHotel");
Route::delete('/hotel/{hotelID}', "hotelController@destroyHotel");
Route::put('/hotel/{hotelID}', "hotelController@updateviewHotel");

Route::post('/room', "RoomTypeController@registerRoom");
Route::get('/room', "RoomTypeController@allRoom");
Route::get('/room/{roomID}', "RoomTypeController@findRoom");
Route::delete('/room/{roomID}', "RoomTypeController@destroyRoom");
Route::put('/room/{roomID}', "RoomTypeController@updateviewRoom");
