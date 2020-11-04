<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'BeepBeep') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <style>
        html, body {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

            background-color: #FFF9E1;
            background-image: url(../images/background.png);
            background-size: auto;
            background-position: top left;
            background-repeat: no-repeat;
            background-attachment: fixed, scroll;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 90px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>{{--首页--}}
<div class="flex-center position-ref full-height">
    <div class="content">

        <div class="title m-b-md">
            BeepBeep
        </div>

        <div class="links">
            @auth
                <a href="{{ route('home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>

        <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
            <p>
                BeepBeep is a simple Twitter clone written in PHP as an example Laravel application.
                Used PHP: The Right Way, an easy-to-read, quick reference for PHP popular coding standards.
                It has the functions of publishing tweets and deleting tweets,
                following users and unfollow users,
                change user information and reset password.
                An awesome social app website with a beautiful UI.
            </p>
        </div>

    </div>
</div>
</body>
</html>
