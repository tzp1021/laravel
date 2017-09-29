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
    View::addExtension('htm', 'php');
    return view('whisper');
});
Route::get('/api', 'WhisperController@api')->name('api');
Route::post('/reportErrId', 'WhisperController@reportErrId');

Route::get('/gotit-api', 'GotitController@api');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('edit', 'EditController@edit')->name('edit');
