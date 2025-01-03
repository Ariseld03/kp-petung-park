<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>Admin</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .custom-navbar {
            --bs-navbar-color: rgba(255, 255, 255, .85) !important;
            --bs-navbar-hover-color: rgba(255, 255, 255) !important;
            background-color: #295A3F;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        .header-padding {
            padding-top: 72px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark custom-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('staf.index') }}">
                    <img src="{{ asset('/images/footer/logoPetungPark.png') }}" alt="Logo" width="40"
                        height="40" class="d-inline-block align-text-top">
                    Petung Park
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wisata.index') }}">Wisata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staf.index') }}">Staf</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('artikel.index') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kegiatan.index') }}">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('galeri.index') }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu.index') }}">Menu/Hidangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links dimatikan dulu ya... -->
                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header-padding"></div>
    </div>
</body>

</html>

