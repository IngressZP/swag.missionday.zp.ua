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


Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'PageController@adminIndex')
        ->name('admin.index');


    # Category routes
    Route::get('/categories', 'CategoryController@index')
        ->name('admin.categories.index');
    Route::get('/category/edit/{category}', 'CategoryController@edit')
        ->name('admin.categories.edit');
    Route::post('/category/update/{category}', 'CategoryController@update')
        ->name('admin.categories.update');
    Route::delete('/category/delete/{category}', 'CategoryController@delete')
        ->name('admin.categories.delete');


    # Product routes
    Route::get('/products', 'ProductController@index')
        ->name('admin.products.index');
    Route::get('/product/edit/{category}', 'ProductController@edit')
        ->name('admin.products.edit');
    Route::post('/product/update/{category}', 'ProductController@update')
        ->name('admin.products.update');
    Route::delete('/product/delete/{category}', 'ProductController@delete')
        ->name('admin.products.delete');


    Route::get('/settings', 'PageController@adminSettings')
        ->name('admin.settings');
});
