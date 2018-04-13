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

Route::get('/', 'PageController@index')
    ->name('index');

Route::get('/login', 'PageController@login')
    ->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'name' => 'admin'], function () {
    Route::get('/', 'PageCotroller@adminIndex')
        ->name('index');
});
