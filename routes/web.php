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
    Route::get('/delflower/{id}', 'flower@destroy');
    Route::get('/editflower/{id}','flower@edit')->name('editflower');
    Route::get('/mancat','category@managecategory');
    Route::get('/delcat/{id}', 'category@destroy');
    Route::get('/editcat/{id}','category@edit')->name('editcategory');
});

Route::get('/', 'UserController@index');
Route::post('/register','register@register');
Route::post('/login','Login@login');
Route::get('/logout','Login@logout');
Route::get('/login','Login@showloginform');
Route::get('/viewcat','UserController@viewcategory');
Route::get('/register','register@showregisterform');
