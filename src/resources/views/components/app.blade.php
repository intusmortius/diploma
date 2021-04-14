<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diploma') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="container-fluid">
            <div class="header-container">
                <div class="header-nav">
                    <div class="header-logo">
                        <a href="{{route("home")}}"><img src="img/header-logo.svg" alt="logo"></a>
                    </div>
                    <div class="header-nav-item"><a href="{{route("workers")}}">{{__('Workers')}}</a></div>
                    <div class="header-nav-item"><a href="{{route("vacancies")}}">{{__('Vacancies')}}</a></div>
                </div>
                <div class="header-nav">
                    <div class="header-nav-item"><a href="/login">{{__('Log in')}}</a></div>
                    <span class="left-line"></span>
                    <div class="header-nav-item"><a href="/register">{{__('Sign in')}}</a></div>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        {{$slot}}
    </main>
    <footer class="footer">
        <div class="container-fluid">
            <div class="footer-container">
                <div class="footer-copyright">
                    © {{__('Development of a student of the VT-17 group Krutikov Vlad')}}
                </div>
            </div>
        </div>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset("js/main.js") }}"></script>

</body>

</html>