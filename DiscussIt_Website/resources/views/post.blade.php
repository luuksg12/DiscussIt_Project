@extends("layouts.postLayout")
        @section('title')
            <h1>Posts</h1>
        @endsection
        @section("content")
        <div id="postholder">
            @foreach($posts as $post)
                <div id="post">
                <h2>Title : {{$post->title}}</h2>
                <h4>Post number : {{$post->id}} <br>
                    Author : {{$post->author}}</h4>
                <p>Message : {{$post->text}}</p>
                </div>
            @endforeach
        </div>
        @endsection
