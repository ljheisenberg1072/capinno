<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@root')->name('root');

Route::get('carousels', 'UserSignsController@index')->name('carousels.index');
Route::get('carousels/{carousel}', 'UserSignsController@show')->name('carousels.show');
Route::get('guidances', 'GuidancesController@index')->name('guidances.index');

Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('my_campaigns', 'MyCampaignsController@index')->name('my_campaigns.index');
    Route::get('user_signs', 'UserSignsController@index')->name('user_signs.index');
    Route::get('user_signs/create', 'UserSignsController@create')->name('user_signs.create');
    Route::post('user_signs', 'UserSignsController@store')->name('user_signs.store');
    Route::get('user_signs/{user_sign}', 'UserSignsController@show')->name('user_signs.show');
    Route::get('user_signs/{user_sign}/edit', 'UserSignsController@edit')->name('user_signs.edit');
    Route::put('user_signs/{user_sign}', 'UserSignsController@update')->name('user_signs.update');
});
