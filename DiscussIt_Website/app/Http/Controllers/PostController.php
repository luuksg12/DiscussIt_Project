<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use PhpParser\Node\Expr\PostInc;
use Auth;

class PostController extends Controller
{
    public function databaseLoad(){

    }

    public function index(){
        $posts = Post::all();
        return view('post',['posts' => $posts]);
    }
    public function show($id){
        $post = Post::findOrFail($id);
        return view('singlepost',['post' => $post]);
    }
    public function myposts(){
        $posts = Post::all();
        return view('myposts',['posts' => $posts]);
    }
    public function create(){
        return view('create');
    }
    public function store(){
        $post = new Post();
        $post->title = request('title');
        $post->text = request('text');

        $post->author = auth()->user()->name;

        $post->save();
        return redirect("/posts");
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect("/posts");
    }
    public function vote($id){
        $post = Post::findOrFail($id);
        $post->vote =+ 1;
        return redirect("/posts");
    }
}
