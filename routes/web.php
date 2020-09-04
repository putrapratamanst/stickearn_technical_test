<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/player/form', 'PlayerController@form');
Route::post('/player/create', 'PlayerController@create');
Route::get('/scrambler/playground', 'ScramblerController@playground');
Route::post('/scrambler/check', 'ScramblerController@check');
Route::get('/scrambler/generate', 'ScramblerController@generate');
