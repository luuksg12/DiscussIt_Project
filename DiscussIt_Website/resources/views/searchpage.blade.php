@extends("layouts.app")
        @section("content")
        <div class="row justify-content-center padding">
            <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
                <form action="/search" method="GET" class="domain-form">
                    <div class="form-group d-md-flex"> <input type="text" name="search" class="form-control px-4" placeholder="Look for a specific post using its title..."> <input type="submit" class="search-domain btn btn-primary px-5" value="Search Posts"> </div>
                </form>
                <form action="/searchdropdown" method="GET" class="domain-form">
                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option>Technology</option>
                            <option>News</option>
                            <option>Sports</option>
                            <option>Science</option>
                            <option>Culture</option>
                        </select>
                    </div>
                    <input type="submit" class="search-domain btn btn-primary px-5" value="Search by category">
                </form>
            </div>
        </div>
        @if(isset($post))
        @foreach($post as $posts)
        <div id="postholder">
            <div class="col-auto border border-dark align text-center mb-4 pb-2" >
                <h2 class="display-5">Title : {{$posts->title}}</h2>
                <h4>Post number : {{$posts->id}} <br>
                    Author : {{$posts->author}}</h4>
                <p class="lead">Message : {{$posts->text}}</p>
                <p>Votes : {{$posts->votes}}</p>
                <p>Category : {{$posts->category}}</p>
                <form action="/posts/{{$posts->id}}" method="POST">
                    @csrf
                    @method('VOTE')
                    <button class="btn btn-primary btn-block mb-2">upvote</button>
                </form>
                <form action="/posts/{{$posts->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-block">Remove post</button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
        @endsection
