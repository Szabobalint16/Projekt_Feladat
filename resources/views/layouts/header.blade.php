<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/mainPage_timeline.js') }}"></script> 

    <!-- Scripts -->
    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'public/css/headerPage.css',
    'public/css/mainPage.css',
    'public/css/mainPage_response_timeLime.css',
    'public/css/mainPage_response_cardsAndP_W.css',
    'public/css/mainPage_footer.css',
])

</head>

<body>
    <header id="header">
        <nav class="navbar navbar-dark bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="#">
                        <img src="kepek/kep.jpg" alt="" width="80" height="40">
                    </a>
                    @auth
                        <h2 style="color:red; padding-top:5px;">User neve</h2>
                    @endauth
                    @guest
                        <h2 style="color:white; padding-top:5px;"></h2>
                    @endguest
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end menu" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            @auth
                                Menu'Simon
                            @endauth
                            @guest
                                Menu
                            @endguest
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Főoldal</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <hr class="dropdownHr">
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li>
                            @guest
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>

                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endguest
                            @auth
                                <li>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-4 mt-5">
        @yield('content')
    </main>



    <footer class="">
        @yield('footer')
    </footer>



</body>

</html>