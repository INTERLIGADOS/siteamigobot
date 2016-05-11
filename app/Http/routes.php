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

Route::group(['prefix' => 'panel', 'as' => 'panel'], function () {
	Route::get('/', ['middleware' => 'auth', function () {
		return view('layouts.panel');
	}]);

	Route::group(['prefix' => 'user', 'as' => '.user'], function() {

		Route::get('login', ['as' => '.login', 'uses' => 'Auth\AuthController@showLoginForm']);
		Route::post('login', ['as' => '.login', 'uses' => 'Auth\AuthController@login']);
		Route::get('logout', ['as' => '.logout', 'uses' => 'Auth\AuthController@logout']);

		Route::get('register', ['as' => '.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
		Route::post('register', ['as' => '.register', 'uses' => 'Auth\AuthController@register']);

		Route::get('password/reset/{token?}', ['as' => '.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
		Route::post('password/email', ['as' => '.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
		Route::post('password/reset', ['as' => '.password.reset', 'uses' => 'Auth\PasswordController@reset']);

		Route::get('profile', ['as' => '.profile', 'uses' => 'Auth\AuthController@showUpdateForm']);
		Route::put('profile', ['as' => '.profile', 'uses' => 'Auth\AuthController@update']);

	});

});

Route::get('/', function () {
	return 'Hello World!';
});
