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

Route::group(['namespace' => 'App\Http\Controllers'], function(){ 
    Route::get('/', 'HomeController@index')->name('home.index');
   Route::get('/login', 'LoginController@show')->name('login');
   Route::post('/do-login', 'LoginController@login')->name('login.perform');
});

