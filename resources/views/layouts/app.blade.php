<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front-end/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/jquery.timepicker.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front-end/css/style.css?v=').time() }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
    <script src="{{ asset('public/front-end/js/notify.min.js') }}"></script>
    @yield('css')
    @yield('script')
</head>

<body>
    <style>
        body {
            font-family: flaticon !important; 
            src: "../../public/front-end/fonts/flaticon/font/Flaticon.ttf" !important;
            font-size: 20px !important;
        }
    </style>
    <!-- header -->
    @include("includes.header")

    @yield('content')


    {{-- @include('sweet::alert') --}}
    <!-- footer -->
    @include("includes.footer")

    <script src="{{ asset('public/front-end/js/login.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/aos.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/front-end/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('public/front-end/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('public/front-end/js/google-map.js') }}"></script>
    <script src="{{ asset('public/front-end/js/main.js') }}"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</body>

</html>


{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
