<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttoms.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="img/favicon.svg" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="EVS" />
    <link rel="manifest" href="img/site.webmanifest" />
    
    @yield("recaptcha")
</head>
<body>
   
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                 English Value School
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- Aquí puedes añadir links a la izquierda si quieres --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('user.profile') }}" aria-label="User profile" class="nav-link d-flex align-items-center">
                                    @if(Auth::user()->avatar)
                                        @include('includes.avatar')
                                    @else
                                        @include('includes.noavatar')
                                    @endif
                                    <span class="ml-2">{{ Auth::user()->user_name }} {{ Auth::user()->surname }}</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('config') }}">
                                        Edit profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.change.password') }}">
                                        Change Password
                                    </a>
                                    @if(Auth::user()->role != 'user')
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        Admin Zone
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mt-5">
            <div class="bar"></div>
            
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                btn.textContent = "🙈";
            } else {
                input.type = "password";
                btn.textContent = "👁️";
            }
        }
    </script>
    @unless(in_array(Route::currentRouteName(), ['privacy-policy', 'home', 'exercises.index', 'exams.index']))
    @include('cookieConsent::index')
    @endunless
    @include('components.footer')
</body>
</html>
