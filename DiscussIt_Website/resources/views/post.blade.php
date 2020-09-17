<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>DiscussIt - post</title>

    </head>

    <body>
        <h1>post</h1>
        <a href="/">Home page</a>
        <h1>{{$title}}</h1>
        <h5>{{$author}}</h5>
        <p>{{$text}}</p>

        @if($likes == 10)
        <h5>{{$likes}}</h5>
        @endif

    </body>
</html>
