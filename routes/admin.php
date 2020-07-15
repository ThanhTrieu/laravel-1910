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
    Route::get('/', 'LoginAdminController@index')->name('login');
    Route::post('/login','LoginAdminController@login')->name('handle.login');
});