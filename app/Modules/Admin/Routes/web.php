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

Route::group(['prefix' => 'administrador'], function () {
    Route::get('/', function () {
        return redirect()->to('administrador/login');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
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
        Route::get('eventos/{id}', 'EventController@show')->name('admin.event.show');
        Route::get('eventos/editar/{id}', 'EventController@edit')->name('admin.event.edit');
        Route::put('eventos/editar/{id}', 'EventController@update');
        Route::post('eventos/{id}/cancelar', 'EventController@cancel')->name('admin.event.cancel');
        Route::get('eventos/{id}/solicitacoes', 'EventController@request')->name('admin.event.request');

        // Routes about Inscription
        Route::put('inscricao/{id}', 'InscriptionController@update')->name('admin.inscription.update');

        // Routes about Themes
        Route::get('temas', 'ThemeController@index')->name('admin.suggest');
        Route::get('temas/adicionar', 'ThemeController@create')->name('admin.suggest.create');
        Route::post('temas/adicionar', 'ThemeController@store');
        Route::get('temas/{id}', 'ThemeController@show')->name('admin.suggest.show');
        Route::put('temas/{id}', 'ThemeController@update');

        // Routes about Notification
        Route::post('notificacoes/{notification}/enviar/{event}', 'NotificationController@notify');
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
    Route::get('/modal/evento/notificar', 'ModalController@eventParticipantsNotification')->name('admin.modal.notify.event');
    Route::get('/modal/evento/cancelar', 'ModalController@cancelEvent')->name('admin.modal.cancel.event');

    // Routes about Images
    Route::get('temas/imagem/{id}', 'ThemeController@image')->name('admin.suggest.image');
});