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
    //return view('welcome');
    return "This is class php1910E";
});

// method get
Route::get('hello-word', function () {
   return "Hello word";
});

// method post
Route::post('demo-post', function () {
   return "This is method post";
});

// method  put
Route::put('demo-put', function () {
    return "This is method put";
});

// match
Route::match(['get', 'post'], 'get-or-post', function () {
   return "Dc phep truy cap get hoac post";
});

// any - chap nhan tat ca cac method deu dc truy cap
Route::any('chap-nhan-moi-method', function () {
   return "Moi method dc truy cap";
});

// truyen tham so len router
// 1 - tham so bat buoc
Route::get('product/{name}/{id}', function ($namePd, $idPd) {
   // {name} va {id} tham so trong router
    return "ban dang xem san phan {$namePd} - id san pham {$idPd}";
});
// product/i-phone/1
// product/sam-sung/2
// 2 - tham so khong bat buoc
Route::get('watch-film/{name?}', function ($nameFilm = null) {
    return "Ban dang xem bo phim : {$nameFilm}";
});
// quy uoc dinh dang cua tham so

Route::get('student/{name}/{masv}', function ($name, $id){
    return "Ho ten : {$name} - msv : {$id}";
})->where([
    'name' => '[A-Za-z]+',
    'masv' => '\d+'
]);

// router view - nap vao 1 view
Route::view('test-view','test.index',['name' => 'Van Teo']);

//name router
Route::get('a-c-dashboard', function(){
   return "this is dashboard";
})->name('myDashboard');

Route::get('test-login', function (){
    // sang router dashboard
    // route(name of router)
     return redirect(route('myDashboard'));
    //return redirect('a-c-dashboard');
});
Route::view('home-page', 'test.home')->name('view.home');
Route::view('view-login','test.login')->name('view.login');
