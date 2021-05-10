<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diploma') }}</title>

    <!-- Styles -->

    {{-- Bootstap --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-container">
                <div class="header-nav">
                    <div class="header-logo">
                        <a href="{{route("home")}}"><img src="/img/header-logo.svg" alt="logo"></a>
                    </div>
                    <div class="header-nav-item"><a href="{{route("workers")}}">{{__('Workers')}}</a></div>
                    <div class="header-nav-item"><a href="{{route("vacancies")}}">{{__('Vacancies')}}</a></div>
                    @can('create_vacancy')
                    <div class="header-nav-item"><a href="{{route("new-vacancy")}}">{{__('New Vacancy')}}</a></div>
                    @endcan
                </div>
                <div class="header-nav">
                    @guest
                    <div class="header-nav-item"><a href="/login">{{__('Log in')}}</a></div>
                    <span class="left-line"></span>
                    <div class="header-nav-item"><a href="/register">{{__('Sign in')}}</a></div>
                    @endguest
                    @auth
                    <div class="header-nav-item"><a href="{{route("profile", auth()->user())}}">{{__('Profile')}}</a>
                    </div>
                    <span class="left-line"></span>
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button type="submit" class="header-nav-item btn-transparent">{{__('Logout')}}</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        {{$slot}}
    </main>
    <footer class="footer">
        <div class="container">
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