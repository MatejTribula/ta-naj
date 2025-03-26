<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ 'images/favicon.png' }}">
    <title>@yield('title')</title>

    @yield('css')
    <link rel="stylesheet" href="{{ 'css/style.css' }}">
    <link rel="stylesheet" href="{{ 'css/card_styles.css' }}">
    <link rel="stylesheet" href="{{ 'css/animations.css' }}">
    <script src="https://kit.fontawesome.com/11ce3943d3.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('includes.hamburger-menu')
    @include('includes.header')

    @yield('content')



    @include('includes.footer')
</body>
@yield('js')
<script src="{{ 'js/script.js' }}"></script>

</html>
