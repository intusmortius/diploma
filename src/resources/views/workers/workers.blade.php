<x-app>
    <section id="view_workers" class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Workers") }}</h2>
            <div class="section-content">
                <div class="workers-block-container">
                    @empty($users)
                    <div class="empty-container">{{__("No workers yet")}}</div>
                    @else
                    @foreach ($users as $user)
                    <div class="workers-block">
                        <div class="workers-block-left">
                            <a href="{{route("profile", $user)}}">
                                <div class="workers-avatar">
                                    <img src="/img/avatar-default.svg" alt="avatar-default">
                                </div>
                            </a>
                            <div class="workers-info">
                                <div class="workers-name">
                                    {{$user->name}}
                                </div>
                                <div class="workers-specialization">
                                    {{$user->worker_specialization}}
                                </div>
                                @if ($user->worker_exp)
                                <div class="workers-exp">
                                    <div class="exp-logo-container">
                                        <img src="/img/calendar.svg" alt="calendar">
                                    </div>
                                    <span class="workers-exp-label">{{$user->worker_exp}}</span>
                                </div>
                                @endif

                            </div>
                        </div>
                        @can('contact_with_worker')
                        <div class="workers-contact">
                            <button id="{{$user->id}}" class="btn flare-effect">{{ __("Contact") }}</button>
                        </div>
                        @endcan
                    </div>
                    @endforeach
                    {{$users->links("vendor.pagination.default")}}
                    @endempty
                </div>
                <div class="filters">
                    <h4 class="filters-header">{{ __("Filter") }}</h4>
                    <input type="text" class="filter-search" placeholder="{{ __("Search") }}">
                    <div class="filters-categories">
                        <h4 class="filters-categories-specialization">{{ __("By skills") }}</h4>
                        <div class="filters-categories-container">
                            <span class="filters-category">JavaScript</span>
                            <span class="filters-category">HTML</span>
                            <span class="filters-category">C++</span>
                            <span class="filters-category">PHP</span>
                            <span class="filters-category">Design</span>
                            <span class="filters-category">Python</span>
                            <span class="filters-category">C#</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>