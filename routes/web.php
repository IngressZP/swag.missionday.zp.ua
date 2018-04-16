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
Route::get('/img/uploads/{filename}', 'PageController@getUpload')
    ->name('img.uploads');
Route::get('/lang/{lang}', 'LanguageController@changeLanguage')
    ->name('lang');

# Product routes
Route::get('/product/{product}', 'ProductController@show')
    ->name('product.view');

# Cart routes
Route::get('/checkout', 'CartController@show')
    ->name('cart.show');
Route::get('/cart/clear', 'CartController@clear')
    ->name('cart.clear');
Route::post('/cart/add', 'CartController@addProduct')
    ->name('cart.add');
Route::post('/cart/update', 'CartController@updateProduct')
    ->name('cart.update');
Route::post('/cart/remove', 'CartController@removeProduct')
    ->name('cart.remove');
Route::post('/cart/makeorder', 'CartController@store')
    ->name('cart.submit');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'PageController@adminIndex')
        ->name('admin.index');

    # Order routes
    Route::get('/orders', 'OrderController@index')
        ->name('admin.orders.index');
    Route::get('/order/view/{order}', 'OrderController@adminView')
        ->name('admin.orders.view');
    Route::delete('/order/delete/{order}', 'OrderController@delete')
        ->name('admin.orders.delete');


    # Category routes
    Route::get('/categories', 'CategoryController@index')
        ->name('admin.categories.index');
    Route::get('/categories/create', 'CategoryController@create')
        ->name('admin.categories.create');
    Route::post('/categories/create', 'CategoryController@store')
        ->name('admin.categories.store');
    Route::get('/category/edit/{category}', 'CategoryController@edit')
        ->name('admin.categories.edit');
    Route::post('/category/update/{category}', 'CategoryController@update')
        ->name('admin.categories.update');
    Route::delete('/category/delete/{category}', 'CategoryController@delete')
        ->name('admin.categories.delete');


    # Product routes
    Route::get('/products', 'ProductController@index')
        ->name('admin.products.index');
    Route::get('/products/create', 'ProductController@create')
        ->name('admin.products.create');
    Route::post('/products/create', 'ProductController@store')
        ->name('admin.products.store');
    Route::get('/product/edit/{product}', 'ProductController@edit')
        ->name('admin.products.edit');
    Route::post('/product/update/{product}', 'ProductController@update')
        ->name('admin.products.update');
    Route::delete('/product/delete/{product}', 'ProductController@delete')
        ->name('admin.products.delete');


    # User settings routes
    Route::get('/settings', 'PageController@adminSettings')
        ->name('admin.settings');
    Route::post('/settings/password', 'PageController@changePassword')
        ->name('admin.settings.password');
});
