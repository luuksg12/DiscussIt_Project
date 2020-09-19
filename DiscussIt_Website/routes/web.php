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
    $postsarray = [
        ['title'=>'What about aliens?', 'text'=>'They might really exist if you think about it?!'],
        ['title'=>'Should pineapple on pizza be illegal?', 'text'=>'Like honestly its probably the most unsettling thing humans have ever done...'],
        ['title'=>'Why cant you cycle on they highway?????', 'text'=>'I can cycle about 130km/h if I try. So why cant I cycle on the highway?']
    ];
    return view('post',$post,['posts' => $postsarray]);
});
