<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
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
    public function searchpage(){
        return view('searchpage');
    }
    public function search(Request $request){
        $search = $request->get('search');
        $posts = DB::table('posts')->WHERE('title','LIKE', "%".$search."%")->get();
        return view('searchpage',['post' => $posts]);
    }
    public function findreports(){
        $posts = DB::table('posts')->WHERE('reported','=', 1)->get();
        return view('admin',['post' => $posts]);
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
    public function vote(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->votes = $post->votes + 1;
        $post->save();
        return redirect("/posts");
    }
}
