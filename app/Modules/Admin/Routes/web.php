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
    Route::get('/', function(){
        return redirect()->to('administrador/login');
    });

    Route::group(['middleware' => 'auth:admin'], function(){
        // Routes about Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

        // Routes about Users
        Route::get('usuarios', 'UserController@index')->name('admin.user');
        Route::get('usuarios/{id}', 'UserController@show')->name('admin.user.show');
        Route::get('usuarios/edit/{id}', 'UserController@edit')->name('admin.user.edit');

        // Routes about Events
        Route::get('lista-de-eventos', 'EventController@index')->name('admin.event');

        // Route to logout
        Route::get('logout', 'LoginController@logout');
    });

    // Routes about Login
    Route::get('login', 'LoginController@index')->middleware('guest');
    Route::post('login', 'LoginController@auth');

    // Routes about Recovery
    Route::post('/recuperar', 'LoginController@request')->name('admin.recovery.request');
    Route::get('/recuperar/{token}', 'LoginController@recovery')->where('token', '(.*)')->name('admin.recovery');
    Route::post('/recuperar/{token}', 'LoginController@change')->where('token', '(.*)');

    // Routes about Modal
    Route::get('/modal/recuperacao', 'ModalController@recovery')->name('admin.modal.recovery');
});
