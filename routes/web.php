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

Route::get('carousels', 'RegistrationsController@index')->name('carousels.index');
Route::get('carousels/{carousel}', 'RegistrationsController@show')->name('carousels.show');
Route::get('news_articles', 'NewsArticlesController@index')->name('news_articles.index');
Route::get('news_articles/{news_article}', 'NewsArticlesController@show')->name('news_articles.show');
Route::get('judges', 'JudgesController@index')->name('judges.index');
Route::get('judges/{judge}', 'JudgesController@show')->name('judges.show');
Route::get('guidances', 'GuidancesController@index')->name('guidances.index');
Route::get('submission', 'SubmissionController@index')->name('submission.index');
Route::get('about', 'AboutController@index')->name('about.index');

Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('my_campaigns', 'MyCampaignsController@index')->name('my_campaigns.index');
    Route::get('campaigns', 'CampaignsController@index')->name('campaigns.index');
    Route::get('campaigns/{campaign}/registrations/create', 'RegistrationsController@create')->name('registrations.create');
    Route::post('campaigns/{campaign}/registrations', 'RegistrationsController@store')->name('registrations.store');
    Route::get('campaigns/{campaign}/registrations/{registration}', 'RegistrationsController@show')->name('registrations.show');
    Route::get('campaigns/{campaign}/registrations/{registration}/edit', 'RegistrationsController@edit')->name('registrations.edit');
    Route::put('campaigns/{campaign}/registrations/{registration}', 'RegistrationsController@update')->name('registrations.update');
    Route::get('campaigns/{campaign}/campaign_stages/{campaign_stage}/stage_submissions/create', 'StageSubmissionsController@create')->name('stage_submissions.create');
    Route::get('campaigns/{campaign}/campaign_stages/{campaign_stage}/stage_submissions/{stage_submission}', 'StageSubmissionsController@show')->name('stage_submissions.show');
    Route::post('campaigns/{campaign}/campaign_stages/{campaign_stage}/stage_submissions', 'StageSubmissionsController@store')->name('stage_submissions.store');
    Route::get('campaigns/{campaign}/campaign_stages/{campaign_stage}/stage_submissions/{stage_submission}/edit', 'StageSubmissionsController@edit')->name('stage_submissions.edit');
    Route::put('campaigns/{campaign}/campaign_stages/{campaign_stage}/stage_submissions/{stage_submission}', 'StageSubmissionsController@update')->name('stage_submissions.update');
    Route::post('upload_file', 'StageSubmissionsController@uploadFile')->name('upload_file');
});
