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
	Route::get('login', 'AuthenticationController@getLogin');
	Route::post('login', 'AuthenticationController@postLogin');

	Route::get('/', 'ReviewController@index');
	
	Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
	]);
});
// Route::post('/auth/login', [
//     'as' => 'review', 'uses' => 'UserController@showProfile'
// 	]);
Route::post('auth/login', 'AuthenticationController@postLogin');
/*Route::get('/', function(){
	return view('auth/login');
});*/