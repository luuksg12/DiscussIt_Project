<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<head>
    <title>DiscussIt</title>
</head>

<div>
<img src="/img/logoprog.png" width="80px" height="80px">
@yield('title')
</div>

<body class="antialiased">
    <nav>
        <a href="/">home</a> <a href="/posts">post list</a> <a href="/singlepost/1">single post</a> <a href="/create">Create</a>
    </nav>

@yield('content')
</body>
</html>

