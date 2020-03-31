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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login','Auth\LoginController@showformlogin');
Route::POST('/login_process','Auth\LoginController@login')->name('login_process');
Route::POST('/register/','Auth\RegisterController@create')->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show_room_of_home/{id}','ShowRoomController@index')->name('show_room_of_home');

Route::get('/control_device_room/{keyroom}/{keyled}','ControlDevice@control_led');

