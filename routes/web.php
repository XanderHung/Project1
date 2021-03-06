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

// Route::get('/', function () {
//     return view('home');
// });
Route::group([
    'middleware' =>[\App\Http\Middleware\Admin::class]
],function (){
    Route::get('/addflower', 'flower@showflowerform');
    Route::post('/addflower', 'flower@flower');
    Route::get('/manflower/{id}','flower@manflower');
    Route::get('/delflower/{id}', 'flower@destroy');
    Route::get('/detflower/{id}', 'flower@detailflower');
    Route::get('/editflower/{id}','flower@showeditform');
    Route::post('/updateflower/{id}','flower@update');
    Route::get('/mancat','category@managecategory');
    Route::get('/delcat/{id}', 'category@destroy');
    Route::get('/editcat/{id}','category@showeditform');
    Route::post('/updatecategory/{id}','category@update');
});
Route::group(['middleware' => [\App\Http\Middleware\User::class]],
function (){
Route::post('/addtocart/{id}','Cart@addcart');
Route::patch('/updatecart','Cart@update');
Route::get('/history','history@viewhistory');
Route::get('/detailhistory/{id}','history@detailhistory');
Route::get('/checkout','Cart@checkout');
Route::get('/viewcart','Cart@viewcart');
});
Route::group(['middlware'=>[\App\Http\Middleware\User::class,\App\Http\Middleware\Admin::class]],
function (){
Route::get('/editpass','AdminController@changepassword');
Route::post('/editpass','AdminController@confirmchange');
Route::get('/logout','Login@logout');

});
Route::get('/detailflower/{id}','flower@detailflower');
Route::get('/viewflower/{id}','flower@viewflower');
Route::get('/', 'UserController@index');
Route::post('/register','register@register');
Route::post('/login','Login@login');
Route::get('/login','Login@showloginform');
Route::get('/viewcat','UserController@viewcategory');
Route::get('/register','register@showregisterform');
Route::get('/searchman/{id}','flower@searchman');
Route::get('/searchview/{id}','flower@searchview');
