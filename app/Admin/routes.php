<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router)
{
  $router->get('/', 'HomeController@index');
  $router->resource('/room', RoomModelController::class);
  $router->resource('/user', UserAccountModelController::class);
  $router->resource('/booking', BookingModelController::class);
});
