<x-app>
    <section class="section">
        <div class="container">
            <div class="section-title">
                <div class="section-title__wrapper">
                    <h2>Галерея</h2>
                    <div class="section-title__line"></div>
                </div>
            </div>

            <div class="block-body gallery">
                <div class="gallery__body">
                    @foreach ($users as $user)

                    @if(!$user->hasRoles("admin"))
                    <a href="{{ route("profile", $user) }}" class="gallery__item animate__animated  animate__fadeIn">
                        <div class="gallery__hovereffect">
                            <img src="{{ $user->avatar }}" alt="avatar" class="gallery__img">
                            <div class="gallery__hidden">
                                <p class="gallery__name">{{$user->fullname()}}</p>
                                <span>{{ $user->group }}</span>
                            </div>
                        </div>
                    </a>
                    @endif


                    @endforeach
                </div>

                {{ $users->links("vendor.pagination.default") }}

            </div>
        </div>
    </section>
</x-app>