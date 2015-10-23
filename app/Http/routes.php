<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'SiteController@index');
	Route::post('/show', 'SiteController@showRanks');
	Route::get('/auth/logout', 'AuthenticationController@getLogout');
	Route::post('/create', 'SiteController@create');
});

Route::post('auth/login', 'AuthenticationController@postLogin');
