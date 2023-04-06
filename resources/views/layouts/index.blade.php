<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/adapt.css')}}">




    <script src="  {{asset('assets/js/index.js')}}" defer></script>
    <script src="{{asset('assets/js/swiper.js')}}" defer></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body>

<header class="header">
    <div class="header-wrapper">
        <a href="{{route('main')}}" class="header-logo">
            <img src="{{asset('assets/staticImages/logo.png')}}" alt="">
            <div class="logo-title">ArmBook</div>
        </a>

        <div class="header-icons">
            @auth()
                @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
            <a href="{{route('adminUsers')}}" class="icons-group">
                <div class="icon">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                </div>
                <span class="icon-text">Админ</span>
            </a>
                @endif
            @endauth
            <a href="{{route('catalog')}}" class="icons-group">
                <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                <span class="icon-text">Каталог</span>
            </a>
            <a href="{{route('favorite')}}" class="icons-group">
                <div class="icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
                <span class="icon-text">Избранное</span>
            </a>
            @auth()
                <a href="{{route('logout')}}" class="icons-group">
                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <span class="icon-text">Выйти</span>
                </a>
            @endauth
            @guest()
                <a href="{{route('login')}}" class="icons-group">
                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <span class="icon-text">Войти</span>
                </a>
            @endguest

        </div>
    </div>
</header>

@yield('content')


<footer></footer>

</body>

</html>
