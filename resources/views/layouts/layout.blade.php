<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>NAILS - @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nikita.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>

@include('layouts.header')
<div class="content">
@yield('content')
</div>
@include('layouts.footer')

</body>
</html>
