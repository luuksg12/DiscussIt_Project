@extends("layouts.app")
    @section('title')
        <h1>Home</h1>
    @endsection
    @section('content')
        <div class="border border-dark align mb-4 pb-2 w-50 mr-auto ml-auto">
            <div class="w-75 mr-auto ml-auto">
                <form action="/posts" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="h4">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label class="h4">Password:</label>
                        <input type="text" class="form-control" name="text" placeholder="Enter your message...">
                    </div>
                    <button type="submit" class="btn btn-primary mr-auto ml-auto">Make post</button>
                </form>
            </div>
        </div>
    @endsection
