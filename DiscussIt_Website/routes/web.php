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
    return view('welcome');
});
Route::get('/posts', '\App\Http\Controllers\PostController@index')->middleware('auth')->name('posts');
Route::get('/myposts', '\App\Http\Controllers\PostController@myposts')->middleware('auth')->name('myposts');
Route::get('/admin', '\App\Http\Controllers\PostController@findreports')->middleware('auth','admin')->name('admin');
Route::get('/searchpage', '\App\Http\Controllers\PostController@searchpage')->middleware('auth')->name('searchpage');
Route::get('/search','\App\Http\Controllers\PostController@search')->middleware('auth')->name('search');
Route::get('/create', '\App\Http\Controllers\PostController@create')->middleware('auth')->name('create');
Route::post('/posts', '\App\Http\Controllers\PostController@store')->middleware('auth')->name('store');
Route::delete('/posts/{id}', '\App\Http\Controllers\PostController@destroy')->middleware('auth')->name('destroy');
Route::put('/posts/{id}', '\App\Http\Controllers\PostController@vote')->middleware('auth')->name('vote');
Route::put('/posts', '\App\Http\Controllers\PostController@adminposts')->middleware('auth')->name('adminposts');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
