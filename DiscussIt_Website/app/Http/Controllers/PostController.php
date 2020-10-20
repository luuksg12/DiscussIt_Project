<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use PhpParser\Node\Expr\PostInc;

class PostController extends Controller
{
    public function databaseLoad(){

    }

    public function index(){

        $posts = Post::all();

        return view('post',['posts' => $posts]);
    }
    public function show($id){
        $postsarray = [
            ['title'=>'I am in love with laravel', 'text'=>'It is just so cool!!! I cant get enough of it :D'],
            ['title'=>'What about aliens?', 'text'=>'They might really exist if you think about it?!'],
            ['title'=>'Should pineapple on pizza be illegal?', 'text'=>'Like honestly its probably the most unsettling thing humans have ever done...'],
            ['title'=>'Why cant you cycle on they highway?????', 'text'=>'I can cycle about 130km/h if I try. So why cant I cycle on the highway?']
        ];
        return view('singlepost',['post' => $postsarray,'id'=>$id]);
    }
    public function create(){
        return view('create');
    }
    public function store(){
        $post = new Post();
        $post->title = request('title');
        $post->text = request('text');
        $post->author = "placehold Author";
        $post->save();
        return redirect("/posts");
    }
}
