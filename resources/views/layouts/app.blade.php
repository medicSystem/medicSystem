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
</head>
<body>
<div id="app">
    <nav class="navbar navbar-static-top header" id="header">
        <a class="navbar-brand" href="{{ url('/') }}"><img id="logo" height="40px" width="40px"
                                                           src="https://api.icons8.com/download/08733e130578dfd047d6a49bdda07b37746510ac/Color/PNG/512/Very_Basic/plus-512.png"/><span
                    id="title" class="title">Medic
                Social</span></a>
        <div class="navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav navbar-right ul-nav">
                <!-- Authentication Links -->
                @guest
                    <div class="btn-group" role="group">
                        <li class="li-nav nav-item"><a href="{{ route('login') }}" class="btn btn-secondary log-button"
                                              id="login">Login</a></li>
                        <li class="li-nav nav-item"><a href="{{ route('register') }}" class="btn btn-secondary log-button"
                                              id="register">Register</a></li>
                    </div>
                @else
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle log-button drop-btn" data-toggle="dropdown" role="button"
                           aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->last_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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

    <footer class="footer" id="footer">
        <div class="footer-element navbar-brand"><a href="callto:000000000" class="link num" id="footer-num">+000000000</a>
            <br>
            <a href="mailto:example@example.example" class="link" id="footer-email">example@example.example</a>
        </div>
        <div class="footer-element navbar-brand footer-title" id="footer-title"><p class="fl-right">©MEDIC SOCIAL 2018</p></div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/phone_number.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>--}}
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
