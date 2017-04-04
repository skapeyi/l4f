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

Route::get('/','Auth\LoginController@showLoginForm');

Auth::routes();



/*
|--------------------------------------------------------------------------
| Sms Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'SmsController@index');
Route::post('/ait_sms_callback','SmsController@ait_sms_callback');


/*
|--------------------------------------------------------------------------
| Voice Routes
|--------------------------------------------------------------------------
*/
Route::get('/call-logs', 'VoiceController@index');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/users', 'UserController@index');
Route::get('/usersdata', 'UserController@allUsers');

/*
|--------------------------------------------------------------------------
| Access logs Routes
|--------------------------------------------------------------------------
*/
Route::get('/access-logs','AccesslogController@index');
