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
#    return view('welcome');
#    return view()->file('/public/whisper/whisper.htm');
    View::addExtension('htm', 'php');
    return view('whisper');
});
Route::get('/api', 'WhisperController@api')->name('api');
Route::post('/reportErrId', 'WhisperController@reportErrId');

Route::get('/gotit-api', 'GotitController@api');
#Route::match(['get', 'post'], '/api', 'WhisperController@api')->name('api');
