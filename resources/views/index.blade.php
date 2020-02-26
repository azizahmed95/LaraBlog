<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraBlog</title>

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

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">LaraBlog</a>

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

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-primary"> LaraBlog</h1>
        </div>
    </div>


</body>
</html>
