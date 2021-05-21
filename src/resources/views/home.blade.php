<x-app>
    <section class="section">
        <div class="container">
            <div class="container">
                {{-- <div class="home-search">
                    <input type="text" class="home-search-input" placeholder="{{ __("Search") }}">
            </div> --}}
            <nav class="main-banner">
                <div class="main-banner-description">
                    <h2 class="banner-header">{{ __("Mutual assistance site") }}</h2>
                    <p class="banner-subtitle">{{__("Here you can find those who implement your ideas")}}</p>
                    <p class="banner-text">
                        Цей інтернет-майданчик призначений для того щоб вирішити проблему пошуку
                        роботи для студентів кафедри інформатики, або ж допомогти замовникам в пошуку людей які
                        допоможуть у вирішенні поставлених завдань.
                    </p>
                    <p class="banner-text">
                        Зареєструйтесь в якості виконавця і станьте
                        відкритим для пошуку нової роботи. Або ж станьте замовником і публікуйте свої завдання, на які
                        зацікавлені виконавці зможуть відгукнутися.
                    </p>
                    <a href="{{route("workers")}}">
                        <button class="btn flare-effect">{{__("Find a performer")}}</button>
                    </a>
                </div>
                <div class="banner-logo">
                    <svg width="229" height="171" viewBox="0 0 229 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M185.776 42.7166L168.744 26.8189C164.975 23.3316 159.882 21.375 154.575 21.375H73.4231C68.1275 21.375 63.0108 23.3455 59.2537 26.8189L42.2219 42.7166H0V128.116H22.9C29.1975 128.116 34.2784 123.374 34.3142 117.529H37.5703L67.8412 143.046C78.8977 151.429 94.2478 151.629 105.626 144.315C110.099 147.922 114.929 149.625 120.332 149.625C126.845 149.625 132.963 147.154 137.794 141.609C145.701 144.515 155.04 142.478 160.694 135.998L170.068 125.211C172.072 122.906 173.324 120.268 173.968 117.529H194.686C194.722 123.374 199.838 128.116 206.1 128.116H229V42.7166H185.776ZM17.175 117.429C14.0262 117.429 11.45 115.024 11.45 112.085C11.45 109.146 14.0262 106.741 17.175 106.741C20.3237 106.741 22.9 109.146 22.9 112.085C22.9 115.058 20.3237 117.429 17.175 117.429ZM156.722 115.124L147.383 125.879C146.381 127.014 144.592 127.215 143.34 126.279L134.788 119.8L124.054 131.991C121.907 134.429 118.686 133.594 117.613 132.792L104.445 122.272L98.8636 128.684C93.89 134.395 84.8373 135.264 79.0766 130.888L44.2614 101.498H34.35V58.7145H49.3423L71.4194 38.141C72.135 37.8738 72.7433 37.64 73.4589 37.3729H93.7469L79.8995 49.2293C69.3798 58.2135 68.7716 73.3764 78.3251 83.0619C83.6208 88.4725 100.223 96.8221 114.643 84.5314L117.577 82.0266L156.292 111.35C157.509 112.286 157.688 113.989 156.722 115.124ZM194.65 101.498H169.889C169.066 100.563 168.136 99.6943 167.134 98.9262L130.387 71.0719L134.86 67.2645C137.185 65.2605 137.364 61.8873 135.217 59.7164L131.317 55.8088C129.17 53.6379 125.556 53.5043 123.231 55.4748L103.479 72.3744C100.08 75.2801 94.2836 75.5139 91.0991 72.3744C87.7714 69.068 88.0577 63.9914 91.5284 61.0523L115.001 40.9799C117.649 38.7088 121.084 37.473 124.662 37.473L154.611 37.4062C155.362 37.4062 156.078 37.6734 156.579 38.1744L178.656 58.7478H194.65V101.498ZM211.825 117.429C208.676 117.429 206.1 115.024 206.1 112.085C206.1 109.146 208.676 106.741 211.825 106.741C214.974 106.741 217.55 109.146 217.55 112.085C217.55 115.058 214.974 117.429 211.825 117.429Z" />
                    </svg>

                </div>
            </nav>
            @guest
            <div class="main-banner">
                <div class="main-banner-description">
                    <p class="banner-subtitle">
                        {{ __("Sign up as a freelancer and start looking for a job right now") }}
                    </p>
                    <a href="/register">
                        <button class="btn flare-effect">{{ __("Become a performer") }}</button>
                    </a>
                </div>
                <div class="banner-logo">
                    {{-- <img src="/img/dollar-logo.svg" alt="handshaking"> --}}
                    <svg width="124" height="221" viewBox="0 0 124 221" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M90.0726 100.745L43.5726 87.1051C38.1906 85.5512 34.4448 80.501 34.4448 74.8896C34.4448 67.8539 40.1281 62.1562 47.1462 62.1562H75.692C80.9448 62.1562 86.1115 63.7533 90.417 66.6885C93.0434 68.4582 96.574 68.0266 98.8129 65.8252L113.796 51.1494C116.853 48.1711 116.423 43.2072 113.021 40.5742C102.473 32.2867 89.2976 27.6682 75.7781 27.625V6.90625C75.7781 3.10781 72.6781 0 68.8893 0H55.1115C51.3226 0 48.2226 3.10781 48.2226 6.90625V27.625H47.1462C19.7198 27.625 -2.32463 51.2357 0.215644 79.2492C2.02398 99.1479 17.1795 115.334 36.2962 120.946L80.4281 133.895C85.8101 135.492 89.5559 140.499 89.5559 146.11C89.5559 153.146 83.8726 158.844 76.8545 158.844H48.3087C43.0559 158.844 37.8893 157.247 33.5837 154.312C30.9573 152.542 27.4268 152.973 25.1879 155.175L10.2045 169.851C7.14759 172.829 7.57814 177.793 10.9795 180.426C21.5281 188.713 34.7031 193.332 48.2226 193.375V214.094C48.2226 217.892 51.3226 221 55.1115 221H68.8893C72.6781 221 75.7781 217.892 75.7781 214.094V193.289C95.842 192.9 114.657 180.944 121.288 161.908C130.545 135.319 115.002 108.04 90.0726 100.745V100.745Z" />
                    </svg>
                </div>
            </div>
            @endguest
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
            @empty($users)
            @else
            <div class="main-workers">
                <div class="workers-header">
                    {{ __("Last registered workers") }}
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
                <div class="workers-all">
                    <a href="{{route("workers")}}">
                        <button class="btn flare-effect workers-all-btn">{{ __("All workers") }}</button>
                    </a>
                </div>
            </div>
            @endempty

        </div>
        </div>
    </section>
</x-app>