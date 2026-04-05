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
       <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top " style="background: #ff8c00; border-radius: 0 0 15px 15px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
            <img src="{{ asset('build/assets/images/letsplay.jpg') }}" alt="Let's play logo" width="70" height="70" style="border-radius: 10px;">
            <strong>Let's play</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('videojuego.index') }}">Videojuegos</a>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav ms-auto">

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                           href="#" role="button" data-bs-toggle="dropdown"
                           style="background-color: rgba(255,255,255,0.2); border-radius: 15px; color: white;">
                           
                           <strong>{{ Auth::user()->name }}</strong>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" style="border-radius: 10px;">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>

</html>