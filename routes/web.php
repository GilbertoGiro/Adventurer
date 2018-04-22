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

Route::get('/', 'IndexController@index')->name('web.index');
Route::get('/login', 'LoginController@index')->name('web.login');
Route::get('/eventos-disponiveis', 'EventController@event')->name('web.event');
Route::get('/sugestao-de-temas', 'EventController@suggest')->name('web.suggest');
Route::get('/sobre-nos', 'IndexController@aboutUs')->name('web.about-us');