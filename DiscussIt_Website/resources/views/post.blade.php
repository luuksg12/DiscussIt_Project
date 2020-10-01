@extends("layouts.postLayout")
        @section('title')
            <h1>Posts</h1>
        @endsection
        @section("post")
        <div id="postholder">
            @foreach($posts as $post)
                <div id="post">
                <h2>Title : {{$post['title']}}</h2>
                <h4>Post number : {{$loop->index + 1}},  Author : {{$author}}</h4>
                <p>Message : {{$post['text']}}</p>
                </div>
            @endforeach
        </div>
        @endsection
