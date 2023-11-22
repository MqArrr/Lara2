<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library - @yield('title')</title>
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
</head>
<body>
<h1><a href="{{ route('index') }}">Главная страница</a></h1>
@yield('content')
</body>
</html>
