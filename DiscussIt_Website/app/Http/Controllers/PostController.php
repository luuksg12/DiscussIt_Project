<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostInc;
use Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $adminposts = auth()->user()->status;
        $this->votecheck();
        return view('post',['posts' => $posts, 'adminposts'=>$adminposts]);
    }
    public function searchpage(){
        return view('searchpage');
    }
    public function search(Request $request){
        $search = $request->get('search');
        $posts = DB::table('posts')->WHERE('title','LIKE', "%".$search."%")->get();
        return view('searchpage',['post' => $posts]);
    }
    public function searchdropdown(Request $request){
        $search = $request->get('category');
        $posts = DB::table('posts')->WHERE('category','=', $search)->get();
        return view('searchpage',['post' => $posts]);
    }
    public function findreports(){
        $posts = DB::table('posts')->WHERE('reported','=', 1)->get();
        return view('admin',['post' => $posts]);
    }
    public function myposts(){
        $posts = DB::table('posts')->WHERE('author','=', auth()->user()->name)->get();
        $this->votecheck();
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

        $post->category = request('category');

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
    public function votecheck(){
        $totalvote = 0;
        $posts = DB::table('posts')->WHERE('author','=', auth()->user()->name)->get();
        foreach ($posts as $post){
            $currentvote = $post->votes;
            $totalvote = $totalvote + $currentvote;
            auth()->user()->votes = $totalvote;
        }
        if($totalvote >= 10 and auth()->user()->role != 2){
            auth()->user()->role = 3;
        }
    }
    public function adminposts()
    {
        $user = auth()->user();
        if($user->status == 1) {
            $user->status = 0;
        }else {
            $user->status = 1;
        }
        $user->save();

        return redirect("/posts");
    }
}
