<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/home', 'HomeController@index');
    $router->resource('/hotel', HotelModelController::class);
    $router->resource('/room', RoomModelController::class);
    $router->resource('/user', UserAccountModelController::class);
});
