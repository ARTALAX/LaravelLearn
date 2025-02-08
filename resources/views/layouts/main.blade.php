@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Vite; @endphp
    <!doctype html>
<html lang="ru">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Библиотека</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Книги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

            </ul>
            <nav>

                @if(Route::currentRouteName() === 'register.create')
                    <a href="{{ route('login') }}" class="btn btn btn-success">Вход</a>
                @elseif(Route::currentRouteName() === 'login')
                    <a href="{{ route('register.create') }}" class="btn btn-success">Регистрация</a>
                @else
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-success">Вход</a>
                        <a href="{{ route('register.create') }}" class="btn btn-success">Регистрация</a>
                    @endguest
                    @auth
                        <a href="{{ route('profile.create') }}" class="btn btn-success">Профиль</a>
                    @endauth
                @endif
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('admin.main') }}" class="btn btn-primary">
                        Админ панель
                    </a>
                @endif

                {{--                @if(Auth::user()->role === 'admin')--}}
                {{--                    <a href="{{ route('admin.main') }}" class="btn btn-primary">--}}
                {{--                        Админ панель--}}
                {{--                    </a>--}}
                {{--                @endif--}}

            </nav>
            {{--            <form class="d-flex">--}}
            {{--                <a href="{{ route('register.create') }}" class="btn btn-success" id="register">--}}
            {{--                    Регистрация--}}
            {{--                </a>--}}


            {{--            </form>--}}
            {{--            <form class="d-flex" role="search">--}}
            {{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
            {{--            </form>--}}
        </div>
    </div>
</nav>
@yield('content')
<script src=" https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
