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
                    <span class="profile-subinfo">{{__("Specialization")}}: {{$user->worker_specialization}}</span>
                    <span class="profile-subinfo">{{__("Group")}}: {{$user->worker_group}}</span>
                    <span class="profile-subinfo">{{__("Cathedra")}}: {{$user->worker_cathedra}}</span>
                    <span class="profile-subinfo">{{__("Faculty")}}: {{$user->worker_faculty}}</span>
                    <span class="profile-subinfo">{{__("About")}}:</span>
                    <p class="profile-about">
                        {{$user->about}}
                    </p>
                    <span class="profile-subinfo">{{__("Skills")}}:</span>
                    <div class="filters">
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