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
                            <form method="post" action="{{ route("chat-with", $user) }}">
                                @csrf
                                <button type="submit" id="{{$user->id}}"
                                    class="btn flare-effect">{{ __("Contact") }}</button>
                            </form>
                        </div>
                        @endcan
                    </div>
                    @endforeach
                    {{$users->links("vendor.pagination.default")}}
                    @endempty
                </div>
                <div class="filters">

                    <form method="GET" action="{{ route("workers-search") }}">
                        @csrf
                        <h4 class="filters-header">{{ __("Filter") }}</h4>
                        <input name="search" type="text" class="filter-search" placeholder="{{ __("Search") }}">

                        <div class="filters-categories">
                            <h4 class="filters-categories-specialization">{{ __("By skills") }}</h4>
                            <div class="filters-categories-container">
                                @forelse ($tags as $tag)
                                <div class="filters-category-wrapper filters_category_wrapper">
                                    <input class="filters-category-checkbox" name="tags[]" type="checkbox"
                                        value="{{ $tag->id }}">
                                    <span class="filters-category">{{ $tag->name }}</span>
                                </div>
                                @empty
                                <div class="empty-container">{{__("No tags yet")}}</div>
                                @endforelse
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app>