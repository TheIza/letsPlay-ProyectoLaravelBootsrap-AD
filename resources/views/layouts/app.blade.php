{{--esto es el nav principal--}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background: #ff8c00; border-radius: 0 0 15px 15px;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('welcomeLogeado') }}">
                    <img src="{{ asset('build/assets/images/letsplay.jpg') }}" alt="Let's play logo" width="70" height="70" style="border-radius: 10px; margin-right: 10px;">
                    <strong class="text-white">Let's play</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        {{-- Si el usuario está logueado --}}
                        @auth
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-1 rounded {{ request()->routeIs('welcomeLogeado') ? 'fw-bold text-orange bg-white bg-opacity-25' : 'text-white' }}" href="{{ route('welcomeLogeado') }}">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-1 rounded {{ request()->routeIs('videojuego.index') ? 'fw-bold text-orange bg-white bg-opacity-25' : 'text-white' }}" href="{{ route('videojuego.index') }}">
                                Videojuegos
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-1 rounded {{ request()->routeIs('carrito.index') ? 'fw-bold text-orange bg-white bg-opacity-25' : 'text-white' }}" href="{{ route('carrito.index') }}">
                                <img src="{{ asset('build/assets/images/carrito.png') }}" alt="Carrito" width="20" height="20">
                            </a>
                        </li>
                        @endauth

                        {{-- Si el usuario NO está logueado --}}
                        @guest
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-1 rounded {{ request()->routeIs('welcome') ? 'fw-bold text-orange bg-white bg-opacity-25' : 'text-white' }}" href="{{ route('welcome') }}">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-1 rounded {{ request()->routeIs('videojuego.index') ? 'fw-bold text-orange bg-white bg-opacity-25' : 'text-white' }}" href="{{ route('videojuego.index') }}">
                                Videojuegos
                            </a>
                        </li>
                        @endguest
                        
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item mx-1">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item mx-1">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown mx-1">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" style="background-color: rgba(255,255,255,0.2); border-radius: 15px;">
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="border-radius: 10px;">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(session("success"))
        <div class="container">
            <div class="alert alert-success" role="alert">
                <p>{{ session("success") }}</p>
            </div>
        </div>
        @endif
        <main class="@if(request()->path() == '/' || request()->path() == 'welcomeLogeado' || request()->routeIs('videojuego.index')) py-5 @else py-4 @endif">
            @yield('content')
        </main>
    </div>

</body>

</html>