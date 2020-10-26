@extends("layouts.app")
        @section("content")
        <h2 class="display-4 text-center">My Posts</h2>
        <div class="container">
        <div class="row-auto">
            @foreach($posts as $post)
                @if($post->author == Auth::user()->name)
                <div class="col-auto border border-dark align text-center mb-4 pb-2" >
                    <h2 class="display-5">Title : {{$post->title}}</h2>
                    <h4>Post number : {{$post->id}} <br>
                        Author : {{$post->author}}</h4>
                    <p class="lead">Message : {{$post->text}}</p>
                    <p>Votes : {{$post->votes}}</p>
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('VOTE')
                        <button class="btn btn-primary btn-block mb-2">upvote</button>
                    </form>
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block">Remove post</button>
                    </form>
                </div>
                @endif
            @endforeach
        </div>
        </div>
        @endsection
