@extends("layouts.app")
    @section('title')
        <h1>Home</h1>
    @endsection
    @section('content')
        <form action="/posts" method="POST">
            @csrf
            <label>Title</label><br>
            <input type="text" name="title"><br>
            <label>Text</label><br>
            <input type="text" name="text"><br>
            <input type="submit" value="Make Post">
        </form>
    @endsection
