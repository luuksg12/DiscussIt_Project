@extends("layouts.app")
        @section("content")
        <h2 class="display-4 text-center">Posts</h2>
        <div class="container">
            <div class="row-auto">

                <div class="col-auto border border-dark align text-center mb-4 pb-2">
                <p>Since you are a validated and trusted user you can now turn of administrative posts.</p>
                @if(Auth::user()->status == 0 or Auth::user()->role == 2)
                    <form action="{{route('adminposts')}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-block w-25 mr-auto ml-auto">on</button>
                    </form>
                @else
                    <form action="{{route('adminposts')}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger btn-block w-25 mr-auto ml-auto">off</button>
                    </form>
                @endif
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row-auto">
            @foreach($posts as $post)
            @if($post->author != 'Admin' or Auth::user()->status == 0)
                <div class="col-auto border border-dark align text-center mb-4 pb-2" >
                <h2 class="display-5">Title : {{$post->title}}</h2>
                <h4>Post number : {{$post->id}} <br>
                    Author : {{$post->author}}</h4>
                <p class="lead">Message : {{$post->text}}</p>
                <p>Votes : {{$post->votes}}</p>

                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method("put")
                    <button class="btn btn-primary btn-block mb-2" >upvote</button>
                </form>

                @if($post->author == Auth::user()->name or auth()->user()->role=='2')
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block">Remove post</button>
                    </form>
                @endif
                </div>
            @endif
            @endforeach
        </div>
        </div>
        @endsection
