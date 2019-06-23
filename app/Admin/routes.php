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
    $router->get('campaigns', 'CampaignsController@index');
    $router->get('campaigns/create', 'CampaignsController@create');
    $router->post('campaigns', 'CampaignsController@store');
    $router->get('campaigns/{id}/edit', 'CampaignsController@edit');
    $router->put('campaigns/{id}', 'CampaignsController@update');
});
