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
Route::get('/user',                  ['as' => 'users.index',     'uses' =>'UserController@index',            'middleware' => 'role:admin']);
Route::get('/user/create',           ['as' => 'users.create',    'uses' =>'UserController@create',           'middleware' => 'role:super.admin']);
Route::post('/user',                 ['as' => 'users.store',     'uses' =>'UserController@store',            'middleware' => 'role:super.admin']);
Route::get('/user/{user}',           ['as' => 'users.show',      'uses' =>'UserController@show',             'middleware' => 'role:admin']);
Route::get('/user/{user}/edit',      ['as' => 'users.edit',      'uses' =>'UserController@edit',             'middleware' => 'role:super.admin']);
Route::put('/user/{user}',           ['as' => 'users.update',    'uses' =>'UserController@update',           'middleware' => 'role:super.admin']);
Route::get('/user/{user}/delete',    ['as' => 'users.delete',    'uses' =>'UserController@confirmDelete',    'middleware' => 'role:super.admin']);
Route::delete('/user/{user}',        ['as' => 'users.destroy',   'uses' =>'UserController@destroy',          'middleware' => 'role:super.admin']);

// Article routes...
Route::get('/article',                  ['as' => 'articles.index',     'uses' =>'ArticleController@index',            'middleware' => 'role:admin']);
Route::get('/article/create',           ['as' => 'articles.create',    'uses' =>'ArticleController@create',           'middleware' => 'role:admin']);
Route::post('/article',                 ['as' => 'articles.store',     'uses' =>'ArticleController@store',            'middleware' => 'role:admin']);
Route::get('/article/{article}',        ['as' => 'articles.show',      'uses' =>'ArticleController@show']);
Route::get('/article/{article}/edit',   ['as' => 'articles.edit',      'uses' =>'ArticleController@edit',             'middleware' => 'role:admin']);
Route::put('/article/{article}',        ['as' => 'articles.update',    'uses' =>'ArticleController@update',           'middleware' => 'role:admin']);
Route::get('/article/{article}/delete', ['as' => 'articles.delete',    'uses' =>'ArticleController@confirmDelete',    'middleware' => 'role:super.admin']);
Route::delete('/article/{article}',     ['as' => 'articles.destroy',   'uses' =>'ArticleController@destroy',          'middleware' => 'role:super.admin']);


// News routes...
Route::pattern('year', '\d\d\d\d');
Route::get('/news/{year?}',       ['as' => 'news.index',     'uses' =>'NewsController@index']);
Route::get('/news/create',        ['as' => 'news.create',    'uses' =>'NewsController@create',           'middleware' => 'role:admin']);
Route::post('/news',              ['as' => 'news.store',     'uses' =>'NewsController@store',            'middleware' => 'role:admin']);
Route::get('/news/{news}',        ['as' => 'news.show',      'uses' =>'NewsController@show']);
Route::get('/news/{news}/edit',   ['as' => 'news.edit',      'uses' =>'NewsController@edit',             'middleware' => 'role:admin']);
Route::put('/news/{news}',        ['as' => 'news.update',    'uses' =>'NewsController@update',           'middleware' => 'role:admin']);
Route::get('/news/{news}/delete', ['as' => 'news.delete',    'uses' =>'NewsController@confirmDelete',    'middleware' => 'role:super.admin']);
Route::delete('/news/{news}',     ['as' => 'news.destroy',   'uses' =>'NewsController@destroy',          'middleware' => 'role:super.admin']);