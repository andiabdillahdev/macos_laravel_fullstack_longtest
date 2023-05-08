<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function(){ 
   Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/login', 'LoginController@show')->name('login');
    Route::post('/do-login', 'LoginController@login')->name('login.perform');

    // Route::group(['middleware' => ['authcheck']], function(){
    //     Route::get('/login', 'LoginController@show')->name('login');
    //     Route::post('/do-login', 'LoginController@login')->name('login.perform');
        
    // });

    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => ['admin']], function() {
        Route::get('/dashboard-admin', 'HomeController@dashboard_admin')->name('dashboard.admin');

        Route::prefix('books')->group(function () {
            Route::get('/', 'BookController@index')->name('books.index');
            Route::get('/datatable-list', 'BookController@datatable')->name('books.datatable');
            Route::post('/store', 'BookController@store')->name('books.store');
            Route::get('/show/{params}', 'BookController@show')->name('books.show');
            Route::put('/update/{params}', 'BookController@update')->name('books.update');
            Route::delete('/delete/{params}', 'BookController@delete')->name('books.delete');
        });

        Route::prefix('members')->group(function () {
            Route::get('/', 'MembersController@index')->name('members.index');
            Route::get('/datatable-list', 'MembersController@datatable')->name('members.datatable');
            Route::post('/store', 'MembersController@store')->name('members.store');
            Route::get('/show/{params}', 'MembersController@show')->name('members.show');
            Route::put('/update/{params}', 'MembersController@update')->name('members.update');
            Route::delete('/delete/{params}', 'MembersController@delete')->name('members.delete');
        });
    });

    Route::group(['middleware' => ['user']], function() {
        Route::get('/dashboard-user', 'HomeController@dashboard_user')->name('dashboard.user');
    });
});

