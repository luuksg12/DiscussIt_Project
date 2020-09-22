<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>DiscussIt</title>
</head>

<body class="antialiased">
@yield('title')
<nav>
<a href="/">home</a> <a href="/post">post</a>
</nav>
@yield('post')
</body>
</html>

