<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/" style="display: flex;">
                    <img class="logo" height="40px"
                         width="40px"
                         src="https://api.icons8.com/download/08733e130578dfd047d6a49bdda07b37746510ac/Color/PNG/512/Very_Basic/plus-512.png"
                         style="margin-top: -10px;"
                    >
                    Medic Social
                </a>
            </div>

            <ul class="nav navbar-nav">
                @guest
                    <li role="presentation" class="selected">
                        <a href="{{ route('login') }}" class="btn btn-secondary log-button transparent" id="login">
                            Login
                        </a>
                    </li>
                    <li role="presentation" class="selected">
                        <a href="{{ route('register') }}" class="btn btn-secondary log-button transparent"
                           id="register">
                            Register
                        </a>
                    </li>

                @else
                    <li role="presentation" class="selected">
                        <p class="navbar-text">
                            Signed in as:
                        </p>
                    </li>
                    <li class="dropdown">
                        <a role="button" class="dropdown-toggle " data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" href="#" v-pre>
                            {{Auth::user()->last_name }}
                            <span class="caret">

                            </span>
                        </a>
                        <ul role="menu" class="dropdown-menu" aria-labelledby="basic-nav-dropdown">
                            <li role="presentation">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                >
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;"
                                >
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    @yield('content')

    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-header">
                <a href="#home" class="navbar-brand">
                    Brand
                </a>
            </div>
            <p class="navbar-text">
                <a href="mailto:example@example.example" class="navbar-link">
                    example@example.example
                </a>
            </p>
            <p class="navbar-text navbar-right">
                ©MEDIC SOCIAL 2018
            </p>
        </div>
    </nav>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="{{ asset('js/phone_number.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/photo_preview.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>