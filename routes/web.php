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

Route::get("login", ['as' => 'login', 'uses' => 'PageController@getLogin']);

Route::post("login", ['as' => 'post.login', 'uses' => 'PageController@postLogin']);

Route::get("register", ['as' => 'register', 'uses' => 'PageController@getRegister']);

Route::post("register", ['as' => 'post.register', 'uses' => 'PageController@postRegister']);

Route::group(['prefix' => '/', 'middleware' => 'checkAuth'],  function (){
    Route::get("", ['as' => 'home', 'uses' => 'PageController@getIndex']);
});