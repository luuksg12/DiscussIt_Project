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
                        <label class="h4">Text:</label>
                        <input type="text" class="form-control" name="text" placeholder="Enter your message...">
                    </div>

                    <div class="container">
                        <label class="h4">Select Category</label>
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option>Technology</option>
                                <option>News</option>
                                <option>Sports</option>
                                <option>Science</option>
                                <option>Culture</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-auto ml-auto">Make post</button>
                </form>
            </div>
        </div>
    @endsection
