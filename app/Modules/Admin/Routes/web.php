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
        Route::get('usuarios/adicionar', 'UserController@create')->name('admin.user.create');
        Route::post('usuarios/adicionar', 'UserController@store');
        Route::get('usuarios/{id}', 'UserController@show')->name('admin.user.show');
        Route::get('usuarios/editar/{id}', 'UserController@edit')->name('admin.user.edit');
        Route::put('usuarios/editar/{id}', 'UserController@update');

        // Routes about Events
        Route::get('eventos', 'EventController@index')->name('admin.event');
        Route::get('eventos/adicionar', 'EventController@create')->name('admin.event.create');
        Route::post('eventos/adicionar', 'EventController@store');

        // Routes about Themes
        Route::get('temas', 'ThemeController@index')->name('admin.suggest');
        Route::get('temas/adicionar', 'ThemeController@create')->name('admin.suggest.create');
        Route::post('temas/adicionar', 'ThemeController@store');
        Route::get('temas/{id}', 'ThemeController@show')->name('admin.suggest.show');
        Route::put('temas/{id}', 'ThemeController@update');
        Route::get('temas/imagem/{id}', 'ThemeController@image')->name('admin.suggest.image');

        // Routes about Notification
        Route::get('notificacoes', 'NotificationController@index')->name('admin.notification');
        Route::get('notificacoes/{id}', 'NotificationController@show')->name('admin.notification.show');
        Route::get('notificacoes/adicionar', 'NotificationController@create')->name('admin.notification.create');
        Route::post('notificacoes/adicionar', 'NotificationController@store');
        Route::get('notificacoes/editar/{id}', 'NotificationController@edit')->name('admin.notification.edit');
        Route::put('notificacoes/editar/{id}', 'NotificationController@update');

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
    Route::get('/modal/tema/aprovar', 'ModalController@approveTheme')->name('admin.modal.approve.theme');
    Route::get('/modal/tema/reprovar', 'ModalController@disapproveTheme')->name('admin.modal.disapprove.theme');
});