<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('/resources/css/app.css')

</head>
<body>

<div class="container">
    @guest
        <div>
            <a href="{{ route('login') }}">Вход</a>
            <a href="{{ route('registration') }}">Регистрация</a>
        </div>
    @endguest
    @auth
        <div>
            <a href="{{ route('logout') }}">Выход</a>
        </div>
    @endauth

    @section('content')
    @show
</div>

<!-- Scripts -->
@vite('/resourses/js/app.js')

</body>
</html>
