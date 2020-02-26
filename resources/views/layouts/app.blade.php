<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaraBlog') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links a:hover {
            color: #fff;
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ url('/') }}">LaraBlog</a>

            <!-- Links -->
            <ul class="navbar-nav">

            @auth
                <li class="nav-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
            @else
                <li class="nav-item links">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item links">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endauth
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
