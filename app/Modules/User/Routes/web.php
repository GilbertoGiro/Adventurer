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
        // Routes about Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');

        // Routes about Themes
        Route::get('temas', 'ThemeController@index')->name('user.theme');
        Route::get('temas/adicionar', 'ThemeController@create')->name('user.theme.create');
        Route::post('temas/adicionar', 'ThemeController@store');
        Route::get('temas/{id}', 'ThemeController@show')->name('user.theme.show');

        // Routes about Events
        Route::get('eventos', 'EventController@index')->name('user.event');
        Route::get('eventos/{id}', 'EventController@show')->name('user.event.show');
        Route::post('eventos/{id}', 'EventController@apply');

        // Routes about Configuration
        Route::get('configuracoes', 'ConfigurationController@index')->name('user.configuration');

        // Routes about Ajax Requests
        Route::get('ajax/evento/informacoes', 'AjaxController@getEventByDate')->name('user.ajax.event.show');

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
    Route::get('/modal/evento/inscrever', 'ModalController@applyParticipant')->name('user.modal.event.apply');
});