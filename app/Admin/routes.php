<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');
    $router->get('compaigns', 'CompaignsController@index');
    $router->get('compaigns/create', 'CompaignsController@create');
    $router->post('compaigns', 'CompaignsController@store');
    $router->get('compaigns/{id}/edit', 'CompaignsController@edit');
    $router->put('compaigns/{id}', 'CompaignsController@update');
});
