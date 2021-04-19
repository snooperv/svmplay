<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title ?? 'SVM play' }}</title>
</head>
<body>
@include('layouts.header')

<div class="container">
    @yield('content')
</div>

@include('layouts.footer')
</body>
</html>
