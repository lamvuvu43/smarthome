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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showformlogin');
Route::POST('/login', 'Auth\LoginController@login')->name('login');
Route::GET('/logout', 'Auth\LoginController@logout')->name('logout');
Route::POST('/register/', 'Auth\RegisterController@create')->name('register');
Route::get('/api/{id_devi}/{value}', 'ControlDeviceController@api');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/show_room_of_home/{id}', 'ShowRoomController@index')->name('show_room_of_home');

    Route::get('/control_device_room/{id_room}', 'ControlDeviceController@list_device')->name('control_device.list');
    Route::get('/control_device_share/{id_con}','ControlDeviceController@control_devie_share')->name('control_device_share');
    Route::get('/control_checkbox_process/{id_con}/{value}', 'ControlDeviceController@control_checkbox')->name('control_checkbox_process');
    Route::get('/control_range_process/{id_con}/{value}', 'ControlDeviceController@control_range')->name('control_range_process');
    Route::get('/API/{id_con}/{value}', 'ControlDeviceController@control_range')->name('control_range_process');

    Route::get('/add_home', 'HomeProcessController@index')->name('add_home');
    Route::get('/list_house', 'HomeProcessController@list_house')->name('list_house.show');
    Route::get('/show_edit_house/{id}', 'HomeProcessController@show_edit_house')->name('show_edit_house.show');
    Route::post('/edit_house/{id_house}', 'HomeProcessController@edit_house_process')->name('edit_house.process');
    Route::post('/add_home/processing', 'HomeProcessController@create')->name('add_home_processing');
    Route::get('/add_room', 'HomeProcessController@show_form_room')->name('show_form_room');
    Route::get('/add_room/jquery_get_floor/{id}', 'HomeProcessController@get_floor');
    Route::get('/add_room/jquery_get_room/{id}', 'HomeProcessController@get_room');
    Route::post('/add_room/processing', 'HomeProcessController@create_room')->name('add_room_processing');
    Route::get('/home', 'HomeProcessController@show')->name('list_home');
    Route::delete('/home/delete/{id_house}','HomeProcessController@delete_house');

    Route::get('/home/floor/{id}', 'FloorProcessController@show')->name('list_floor');
    Route::get('/home/list_floor_edit/{id}', 'FloorProcessController@list_floor_edit')->name('list_floor_edit');
    Route::get('/home/show_floor_edit/{id}', 'FloorProcessController@show_floor_edit')->name('show_floor_edit');
    Route::post('/home/floor_edit_process/{id}', 'FloorProcessController@floor_edit_process')->name('show_floor_edit.process');

    Route::get('/home/floor/room/{id}', 'RoomProcessController@show')->name('list_room');
    Route::get('/home/floor/list_room_edit/{id_floor}', 'RoomProcessController@list_room_edit')->name('list_room_edit');
    Route::get('/home/floor/show_room_edit/{id_room}', 'RoomProcessController@show_room_edit')->name('show_room_edit');
    Route::post('/home/floor/show_room_edit_process/{id_room}', 'RoomProcessController@show_room_edit_process')->name('show_room_edit_process');

    Route::get('/home/show_form_device', 'AddDeviceController@index')->name('add_device.show');
    Route::get('/home/list_form_device', 'AddDeviceController@create')->name('list_device.show');
    Route::get('/home/edit_form_device/{id}', 'AddDeviceController@show')->name('edit_device.show');
    Route::get('/home/show_form_device/get_floor/{id}', 'AddDeviceController@getfloor');
    Route::get('/home/show_form_device/get_room/{id}', 'AddDeviceController@getroom');
    Route::post('/home/show_form_device/add_device', 'AddDeviceController@store')->name('add_device.process');
    Route::delete('/home/delete_con/{id}', 'AddDeviceController@destroy')->name('delete.process');
    Route::get('/home/add_amount/{id}', 'AddDeviceController@get_amount_share')->name('get_amount.process');
    Route::post('/home/update_controller', 'AddDeviceController@update')->name('update.process');
    Route::get('/home/list_share/{id}', 'AddDeviceController@list_share')->name('list.share.show');
    Route::get('/home/show_edit_share_device/{id_con}', 'AddDeviceController@show_form_devi')->name('form.edit.share.show');
    Route::post('/home/update_share_device/{id_con}', 'AddDeviceController@update_share_device')->name('update_share_device.process');
    Route::delete('/home/delete_share_device/{id_dev}/{id_user}', 'AddDeviceController@delete_device_share');
    Route::get('/home/form_edit_device_share/{id_devi}', 'AddDeviceController@show_form_share')->name('show_form_share');
    Route::post('/home/form_edit_device_share/{id_devi}', 'AddDeviceController@show_form_share_process')->name('show_form_share.process');
    Route::post('/home/search_user', 'AddDeviceController@autocomplete')->name('autocomplete.user');

    Route::get('/mqtt', 'MQTTController@mqtt')->name('mqtt');

    Route::get('/home/list_con_his','ControlHistoryController@select_con')->name('list_con_his');
    Route::get('/home/list_con_his/jquery/{id_devi}','ControlHistoryController@list_con_his');
    Route::get('/home/list_con_his/lis_his_devi/{id_devi}','ControlHistoryController@lis_his_devi')->name('lis_his_devi');

});

//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
