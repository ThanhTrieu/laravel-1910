<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'BackendAdmin',
    'prefix' => 'admin',
    'as' => 'admin.'
],function (){
    Route::get('/', 'LoginAdminController@index')
        ->middleware('is.logined.admin')
        ->name('login');
    Route::post('/login','LoginAdminController@login')->name('handle.login');
    Route::post('/logout', 'LoginAdminController@logout')->name('logout');
});

Route::group([
    'namespace' => 'BackendAdmin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['web', 'check.login.admin']
], function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/list-products', 'ProductController@index')->name('list.products');

    Route::get('/list-brands', 'BrandController@index')->name('brand');
    Route::get('/brand/add-brand', 'BrandController@addBrand')->name('add.brand');
    Route::post('/brand/handle-add', 'BrandController@handleAddBrand')->name('handle.add.brand');
    Route::post('/brand/delete-brand', 'BrandController@deleteBrand')->name('brand.delete');
    Route::get('/brand/{slug}~{id}','BrandController@detail')->name('brand.detail');
    Route::post('/brand/handle-edit/{id}','BrandController@handleEdit')->name('brand.handle.edit');
});
