<x-app>
    <section class="section">
        <div class="container-fluid">
            <div class="container">
                <div class="home-search">
                    <input type="text" class="home-search-input" placeholder="{{ __("Search") }}">
                </div>
                <nav class="main-banner">
                    <div class="main-banner-description">
                        <h2 class="banner-header">{{ __("Mutual assistance site") }}</h2>
                        <p class="banner-subtitle">{{__("Here you can find those who implement your ideas")}}</p>
                        <button class="btn flare-effect">{{__("Find a performer")}}</button>
                    </div>
                    <div class="banner-logo">
                        <img src="/img/handshaking-logo.svg" alt="handshaking">
                    </div>
                </nav>
                <div class="main-banner">
                    <div class="main-banner-description">
                        <p class="banner-subtitle">
                            {{ __("Sign up as a freelancer and start looking for a job right now") }}
                        </p>
                        <button class="btn flare-effect">{{ __("Become a performer") }}</button>
                    </div>
                    <div class="banner-logo">
                        <img src="/img/dollar-logo.svg" alt="handshaking">
                    </div>
                </div>
                <div class="home-slider">
                    <div class="swiper-container home-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/img/slider.png" alt="slider"></div>
                            <div class="swiper-slide"><img src="/img/slider2.png" alt="slider2"></div>
                            <div class="swiper-slide"><img src="/img/slider3.png" alt="slider3"></div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="main-workers">
                    <div class="workers-header">
                        {{ __("The best workers") }}
                    </div>
                    <div class="workers-container">
                        @foreach ($users as $user)
                        <div class="workers-block">
                            <div class="workers-avatar">
                                <img src="/img/avatar-default.svg" alt="avatar-default">
                            </div>
                            <div class="workers-info">
                                <div class="workers-name">
                                    {{ $user->name }}
                                </div>
                                <div class="workers-specialization">
                                    {{$user->worker_specialization}}
                                </div>
                                @if ($user->worker_exp)
                                <div class="workers-exp">
                                    <div class="exp-logo-container">
                                        <img src="/img/calendar.svg" alt="calendar">
                                    </div>
                                    <span class="workers-exp-label">Опыт работы 2 года</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>