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

Route::get('/', 'UserController@index');
Route::get('/addcat', 'AdminController@addcategory');
Route::post('/addcat', 'AdminController@store')->name('addcategory');
Route::post('/register','Login@store')->name('adduser');
Route::get('/viewcat','AdminController@viewcategory');
Route::get('/login','UserController@login');
Route::get('/register','UserController@register');
Route::get('/delcat/{id}', 'AdminController@destroy');
Route::get('/editcat/{id}','AdminController@edit')->name('editcategory');
Route::get('/mancat','AdminController@managecat');