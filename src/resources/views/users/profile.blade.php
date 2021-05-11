<x-app>
    <section id="view_workers_profile" class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Profile") }}</h2>
            <div class="section-content flex justify-content-between">
                <div class="profile-avatar-block flex-column">
                    <div class="profile-avatar">
                        <img src="/img/avatar-default.svg" alt="avatar-default">
                    </div>
                    @can('contact_with_worker')
                    <button class="btn btn-primary flare-effect">{{ __("Contact") }}</button>
                    @endcan
                </div>
                <div class="profile-info flex flex-column">
                    <div class="profile-header">
                        <h4 class="profile-name">{{$user->name}}</h4>
                        @can('update', $user)
                        <a href="{{route("workers-edit", $user)}}">
                            <div class="profile-edit"></div>
                        </a>
                        @endcan
                    </div>
                    @isset($user->worker_specialization)
                    <span class="profile-subinfo">{{__("Specialization")}}: {{$user->worker_specialization}}</span>
                    @endisset
                    @isset($user->worker_group)
                    <span class="profile-subinfo">{{__("Group")}}: {{$user->worker_group}}</span>
                    @endisset
                    @isset($user->worker_cathedra)
                    <span class="profile-subinfo">{{__("Cathedra")}}: {{$user->worker_cathedra}}</span>
                    @endisset
                    @isset($user->worker_faculty)
                    <span class="profile-subinfo">{{__("Faculty")}}: {{$user->worker_faculty}}</span>
                    @endisset
                    @isset($user->about)
                    <span class="profile-subinfo">{{__("About")}}:</span>
                    <p class="profile-about">
                        {{$user->about}}
                    </p>
                    @endisset
                    @if (!$tags->isEmpty())
                    <span class="profile-subinfo">{{__("Skills")}}:</span>
                    <div class="filters">
                        <div class="filters-categories-container">
                            @foreach ($tags as $tag)
                            <span class="filters-category">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app>