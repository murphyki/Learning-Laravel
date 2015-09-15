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

Route::get('/', function () {
    return view('app');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// User routes...
Route::get('/user',                  ['as' => 'user.index', 'uses' =>'UserController@index', 'middleware' => 'role:admin']);
Route::get('/user/create',           ['as' => 'user.create', 'uses' =>'UserController@create', 'middleware' => 'role:super.admin']);
Route::post('/user',                 ['as' => 'user.store', 'uses' =>'UserController@store', 'middleware' => 'role:super.admin']);
Route::get('/user/{user}',           ['as' => 'user.show', 'uses' =>'UserController@show', 'middleware' => 'role:super.admin']);
Route::get('/user/{user}/edit',      ['as' => 'user.edit', 'uses' =>'UserController@edit', 'middleware' => 'role:super.admin']);
Route::post('/user/{user}',          ['as' => 'user.update', 'uses' =>'UserController@update', 'middleware' => 'role:super.admin']);
Route::delete('/user/{user}/delete', ['as' => 'user.destroy', 'uses' =>'UserController@destroy', 'middleware' => 'role:super.admin']);