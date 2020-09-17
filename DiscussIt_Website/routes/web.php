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
Route::get('/post', function () {
    $post = [
        'title'=>'I am in love with laravel',
        'text'=>'It is just so cool!!! I cant get enough of it :D',
        'author'=>'superPoster2773',
        'likes'=>'10',
    ];
    return view('post', $post);
});
