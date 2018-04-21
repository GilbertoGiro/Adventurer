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

Route::group(['prefix' => 'administrador'], function(){
    Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('dashboard', function(){
            echo '<pre>';print_r(2);exit;
        });
    });

    Route::get('login', 'LoginController@index');
});
