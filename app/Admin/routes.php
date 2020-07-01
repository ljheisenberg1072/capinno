<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->get('users', 'UsersController@index');
    $router->get('campaigns', 'CampaignsController@index');
    $router->get('campaigns/create', 'CampaignsController@create');
    $router->post('campaigns', 'CampaignsController@store');
    $router->get('campaigns/{id}/edit', 'CampaignsController@edit');
    $router->put('campaigns/{id}', 'CampaignsController@update');
    $router->get('carousels', 'CarouselsController@index');
    $router->get('carousels/create', 'CarouselsController@create');
    $router->post('carousels', 'CarouselsController@store');
    $router->get('carousels/{id}', 'CarouselsController@show');
    $router->get('carousels/{id}/edit', 'CarouselsController@edit');
    $router->put('carousels/{id}', 'CarouselsController@update');
    $router->delete('carousels/{id}', 'CarouselsController@destroy');
    $router->get('news_categories', 'NewsCategoriesController@index');
    $router->get('news_categories/create', 'NewsCategoriesController@create');
    $router->post('news_categories', 'NewsCategoriesController@store');
    $router->get('news_categories/{id}/edit', 'NewsCategoriesController@edit');
    $router->put('news_categories/{id}', 'NewsCategoriesController@update');
    $router->get('news_articles', 'NewsArticlesController@index');
    $router->get('news_articles/create', 'NewsArticlesController@create');
    $router->post('news_articles', 'NewsArticlesController@store');
    $router->get('news_articles/{id}/edit', 'NewsArticlesController@edit');
    $router->put('news_articles/{id}', 'NewsArticlesController@update');
    $router->delete('news_articles/{id}', 'NewsArticlesController@destroy');

});
