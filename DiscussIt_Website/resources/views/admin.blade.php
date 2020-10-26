@extends("layouts.app")
@section('title')
    <h1>Posts</h1>
@endsection
@section("content")
    @if(isset($post))
    @foreach($post as $posts)
        <div id="postholder">
            <div class="col-auto border border-dark align text-center mb-4 pb-2" >
                <h2 class="display-5">Title : {{$posts->title}}</h2>
                <h4>Post number : {{$posts->id}} <br>
                    Author : {{$posts->author}}</h4>
                <p class="lead">Message : {{$posts->text}}</p>
                <p>Votes : {{$posts->votes}}</p>
                <form action="/posts/{{$posts->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-block">Remove post</button>
                </form>
            </div>
        </div>
    @endforeach
        <p class="text-center">--- If this text is at the top there are no reported posts left ---</p>
    @endif
@endsection
