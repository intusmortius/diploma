<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
    <meta name="userID" content="{{ auth()->user()->id }}">
    @endauth

    <title>{{ config('app.name', 'Diploma') }}</title>

    <!-- Styles -->

    {{-- Bootstap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

</head>

<body>
    <x-modals.modal-delete-chat>
    </x-modals.modal-delete-chat>
    <x-modals.modal-delete-vacancy>
    </x-modals.modal-delete-vacancy>
    <header class="header">
        <div class="container">
            <div class="header-container">
                <div class="header-nav">
                    <div class="header-logo">
                        <a href="{{route("home")}}"><img src="/img/header-logo.svg" alt="logo"></a>
                    </div>
                    <div class="header-nav-item"><a href="{{route("workers")}}">{{__('Workers')}}</a></div>
                    <div class="header-nav-item"><a href="{{route("vacancies")}}">{{__('Vacancies')}}</a></div>
                    @auth
                    @can('create_vacancy')
                    <div class="header-nav-item"><a href="{{route("new-vacancy")}}">{{__('New Vacancy')}}</a></div>
                    <div class="header-nav-item"><a href="{{route("my-vacancy")}}">{{__('My vacancies')}}</a></div>
                    @endcan
                    <div class="header-nav-item"><a href="{{route("chat")}}">{{__('Chat')}}</a></div>
                    <div class="header-nav-item"><a href="{{route("feedback")}}">{{__('Feedback')}}</a></div>
                    @endauth
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
                <div class="footer-info">
                    <div class="footer__contacts">
                        <h3 class="footer__title">Контакти</h3>
                        <span class="footer__item">Email: kaf-inf@i.ua</span>
                        <span class="footer__item">Телефон: +38 (0629) 44-66-18</span>
                        <span class="footer__item">Завідуючий кафедрою: Мiроненко Д.С.</span>
                        <span class="footer__item"><a href="#">Зворотній зв'язок</a></span>
                    </div>
                    <div class="footer__contacts">
                        <h3 class="footer__title">Адреса</h3>
                        <span class="footer__item">Вулиця Італійська, 115, 3
                            корпус ДВНЗ "ПДТУ"</span>
                        <span class="footer__item"><a href="https://goo.gl/maps/eRUqvBhyAn6nTopH6">Знайти на
                                картi</a></span>

                    </div>
                </div>
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