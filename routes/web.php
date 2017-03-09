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

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::get('/import/process/{excelkey}', 'ImportController@importDB');
Route::get('/import/list/{excelkey}', 'ImportController@prepareimport');
Route::get('/import/{doctype}', 'ImportController@index');
Route::get('/resource/template', 'ImportController@downloadtemplate');
Route::resource('/import', 'ImportController');

Route::get('/db', 'DBTestController@index');
Route::get('/setting/timeweather', 'DisplayController@getWeather');
Route::get('/setting/newsfeed', 'DisplayController@getNewsfeed');

Route::get('/api/{updateitem}', 'DisplayController@getJSON');

Route::get('/display/{displayitem}', 'DisplayController@showDisplay');
Route::get('/notice', 'SettingController@noticepage');



Route::post('/setting/{updateitem}/update', 'SettingController@update');
Route::post('/import/{doctype}', 'ImportController@processxls');
