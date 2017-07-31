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
Route::get('/api', 'WhisperController@api')->name('api');
Route::post('/reportErrId', 'WhisperController@reportErrId');
#Route::match(['get', 'post'], '/api', 'WhisperController@api')->name('api');
