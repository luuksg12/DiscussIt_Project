@extends("layouts.app")
        @section('title')
            <h1>Singlepost {{$id}}</h1>
        @endsection
        @section("content")
        <div id="postholder">
            <div id="post">
                <h2>Title : {{$post[$id]['title']}}</h2>
                <h4>Post number : {{$id}},  Author : placehold  -  -</h4>
                <p>Message : {{$post[$id]['text']}}</p>
            </div>
        </div>
        @endsection
