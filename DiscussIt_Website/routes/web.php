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
Route::get('/admin', function (){return view('admin');})->middleware('auth','admin')->name('admin');
Route::get('/singlepost/{id}', '\App\Http\Controllers\PostController@show')->middleware('auth')->name('singlepost');
Route::get('/create', '\App\Http\Controllers\PostController@create')->middleware('auth');
Route::post('/posts', '\App\Http\Controllers\PostController@store')->middleware('auth');
Route::delete('/posts/{id}', '\App\Http\Controllers\PostController@destroy')->middleware('auth');
Route::put('/posts/{id}', '\App\Http\Controllers\PostController@vote')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
