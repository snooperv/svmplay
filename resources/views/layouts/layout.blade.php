<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Check It!</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="<?php echo asset('css/nikita.css');?>" rel="stylesheet">
</head>

<body>

@include('layouts.header2')
@yield('content')
@include('layouts.footer2')

</body>
</html>
