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

/* group router */
// localhost:8000/api/v1/user
// localhost:8000/api/v1/comment
// localhost:8000/api/v1/posts
Route::group([
    'prefix' => 'api/v1',
    'as' => 'api.'
    //'namespace' => 'API',
    //'middleware' => 'test'
], function (){
    Route::get('user', function (){
       return "This is user test";
    })->name('user');
    Route::get('comment', function (){
       return "this is comment test";
    })->name('comment');
});
Route::get('view-api', function (){
    return redirect()->route('api.user');
    // return redirect(route('api.user'));
});

//Accessing The Current Route
Route::get('admin/dashboard', function () {
    //$currentRoute = Route::current();
    //dd($currentRoute); // var_dump() + die()
    //$nameRoute = Route::currentRouteName(); // ten cua router hien tai
    //dd($nameRoute);
    // router + controller
    $action = Route::currentRouteAction();
    dd($action);
})->name('admin.dashboard');

/* su dung middle cho route */
Route::get('xem-phim/{age}', function ($age) {
    return "Ban du {$age} tuoi de vao xem";
})->middleware('check.age')->name('xem.phim');

Route::get('khong-duoc-xem', function () {
    return "Rat tiec ban chua du tuoi de vao xem";
})->name('khong.duoc.xem');


Route::get('kiem-tra-so-chan/{number}', function ($number) {
   return "Ban vua nhap so {$number} va no la so chan";
})->middleware('kiem.tra.chan.le')->name('check.number');

Route::get('warning', function () {
   return "Ban nhap so sai yeu cau";
})->name('number.warning');


$token = 'abcd12345';
Route::get('api/v2/product/{id}', function ($id) {
    return json_encode([
        'id' => $id,
        'name' => 'test'
    ]);
})->middleware('check.view.api:'.$token);

Route::get('not-permit', function () {
   return "Ban khong duoc phep xem du lieu";
})->name('not.permit');

/* lam viec voi controller */
Route::get('football/{team1}/{team2}', 'TestController@index')->name('football.index');
Route::get('tennis/{player1}/{player2}', 'TestController@tennis')->name('tennis');
//http://localhost:8000/tennis/nadal/nole?time=10-10-2020&place=Spain

Route::get('word/covid-19','TestController@covidCorona')->name('covid.19');
Route::get('/contact', 'TestController@contact')->name('test.contact');
Route::get('test/login', 'TestController@login')->name('test.login');
Route::post('test/handle-login', 'TestController@handleLogin')->name('test.handle.login');
