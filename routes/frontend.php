<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'Frontend',
    'as' => 'fr.'
],function (){
    Route::get('/', 'HomePageController@index')->name('home');
    Route::get('/{slug}~{id}','ProductController@index')->name('detail');
    Route::get('/brand/{slug}','BrandController@index')->name('brand');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/check-out', 'CheckOutController@index')->name('check.out');
});
