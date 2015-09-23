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
Route::get('auth/login',    ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',   ['as' => 'auth.loggedin', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',   ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',     'Auth\AuthController@getRegister');
Route::post('auth/register',    'Auth\AuthController@postRegister');

// User routes...
Route::get('/user',                  ['as' => 'user.index',     'uses' =>'UserController@index',            'middleware' => 'role:admin']);
Route::get('/user/create',           ['as' => 'user.create',    'uses' =>'UserController@create',           'middleware' => 'role:super.admin']);
Route::post('/user',                 ['as' => 'user.store',     'uses' =>'UserController@store',            'middleware' => 'role:super.admin']);
Route::get('/user/{user}',           ['as' => 'user.show',      'uses' =>'UserController@show',             'middleware' => 'role:admin']);
Route::get('/user/{user}/edit',      ['as' => 'user.edit',      'uses' =>'UserController@edit',             'middleware' => 'role:super.admin']);
Route::put('/user/{user}',           ['as' => 'user.update',    'uses' =>'UserController@update',           'middleware' => 'role:super.admin']);
Route::get('/user/{user}/delete',    ['as' => 'user.delete',    'uses' =>'UserController@confirmDelete',    'middleware' => 'role:super.admin']);
Route::delete('/user/{user}',        ['as' => 'user.destroy',   'uses' =>'UserController@destroy',          'middleware' => 'role:super.admin']);

// Article routes...
Route::get('/article',                  ['as' => 'article.index',     'uses' =>'ArticleController@index',            'middleware' => 'role:admin']);
Route::get('/article/create',           ['as' => 'article.create',    'uses' =>'ArticleController@create',           'middleware' => 'role:admin']);
Route::post('/article',                 ['as' => 'article.store',     'uses' =>'ArticleController@store',            'middleware' => 'role:admin']);
Route::get('/article/{slug}',           ['as' => 'article.show',      'uses' =>'ArticleController@show']);
Route::get('/article/{slug}/edit',      ['as' => 'article.edit',      'uses' =>'ArticleController@edit',             'middleware' => 'role:admin']);
Route::put('/article/{slug}',           ['as' => 'article.update',    'uses' =>'ArticleController@update',           'middleware' => 'role:admin']);
Route::get('/article/{slug}/delete',    ['as' => 'article.delete',    'uses' =>'ArticleController@confirmDelete',    'middleware' => 'role:super.admin']);
Route::delete('/article/{slug}',        ['as' => 'article.destroy',   'uses' =>'ArticleController@destroy',          'middleware' => 'role:super.admin']);