<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'usuario'], function (){
    Route::group(['middleware' => 'auth:user'], function() {

    });

    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@auth');
});
