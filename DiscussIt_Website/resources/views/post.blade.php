<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>DiscussIt - post</title>

    </head>

    <body>
        <h1>post</h1>
        <a href="/">Home page</a>
        <div>
            @for($i =0;$i<count($posts);$i++)
                <h1>Title : {{$posts[$i]['title']}}</h1>
                <p>Message : {{$posts[$i]['text']}}</p>
            @endfor
        </div>


    </body>
</html>
