<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/home', 'HomeController@index');
    $router->resource('/Hotel', HotelModelController::class);
    $router->resource('/Room', RoomModelController::class);
});
