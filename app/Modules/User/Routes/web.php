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
    Route::group(['middleware' => 'auth:user'], function(){
        Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');
        Route::get('sugestao-de-temas', 'EventController@suggest')->name('user.suggest');
        Route::get('lista-de-eventos', 'EventController@events')->name('user.events');
        Route::get('configuracoes', 'ConfigurationController@index')->name('user.configuration');

        // Route for Logoff
        Route::get('logout', 'LoginController@logout');
    });

    // Routes about Login
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@auth');

    // Routes about Recovery
    Route::post('/recuperar', 'LoginController@request')->name('user.recovery.request');
    Route::get('/recuperar/{token}', 'LoginController@recovery')->where('token', '(.*)')->name('user.recovery');
    Route::post('/recuperar/{token}', 'LoginController@change')->where('token', '(.*)');

    // Routes about Modal
    Route::get('/modal/recuperacao', 'ModalController@recovery')->name('user.modal.recovery');
});