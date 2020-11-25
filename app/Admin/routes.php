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
    $router->get('users/create', 'UsersController@create');
    $router->post('users', 'UsersController@store');
    $router->get('users/{id}/edit', 'UsersController@edit');
    $router->put('users/{id}', 'UsersController@update');
    $router->get('campaigns', 'CampaignsController@index');
    $router->get('campaigns/create', 'CampaignsController@create');
    $router->post('campaigns', 'CampaignsController@store');
    $router->get('campaigns/{id}/edit', 'CampaignsController@edit');
    $router->put('campaigns/{id}', 'CampaignsController@update');
    $router->get('campaign_categories', 'CampaignCategoriesController@index');
    $router->get('campaign_categories/{id}/edit', 'CampaignCategoriesController@edit');
    $router->put('campaign_categories/{id}', 'CampaignCategoriesController@update');
    $router->get('campaign_stages', 'CampaignStagesController@index');
    $router->get('campaign_stages/{id}/edit', 'CampaignStagesController@edit');
    $router->put('campaign_stages/{id}', 'CampaignStagesController@update');
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
    $router->get('judges', 'JudgesController@index');
    $router->get('judges/{id}/edit', 'JudgesController@edit');
    $router->put('judges/{id}', 'JudgesController@update');
    $router->get('file_sizes', 'FileSizesController@index');
    $router->get('file_sizes/create', 'FileSizesController@create');
    $router->post('file_sizes', 'FileSizesController@store');
    $router->get('file_sizes/{id}/edit', 'FileSizesController@edit');
    $router->put('file_sizes/{id}', 'FileSizesController@update');
    $router->delete('file_sizes/{id}', 'FileSizesController@destroy');
    $router->get('file_types', 'FileTypesController@index');
    $router->get('file_types/create', 'FileTypesController@create');
    $router->post('file_types', 'FileTypesController@store');
    $router->get('file_types/{id}/edit', 'FileTypesController@edit');
    $router->put('file_types/{id}', 'FileTypesController@update');
    $router->delete('file_types/{id}', 'FileTypesController@destroy');
    $router->get('form_settings', 'FormSettingsController@index');
    $router->get('form_settings/create', 'FormSettingsController@create');
    $router->post('form_settings', 'FormSettingsController@store');
    $router->get('form_settings/{id}/edit', 'FormSettingsController@edit');
    $router->put('form_settings/{id}', 'FormSettingsController@update');

});
