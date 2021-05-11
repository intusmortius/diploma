<x-app>
    <section id="view_vacancies" class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Distant work") }}</h2>
            <div class="section-content">
                <div class="vacancies-block-container">
                    {{-- <div class="vacancies-block">
                        <h4 class="vacancies-name">
                            Вакансія роботи
                        </h4>
                        <div class="vacancies-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="vacancies-down">
                            <div class="vacancies-tags-container">
                                <span class="tag">JavaScript</span>
                                <span class="tag">HTML</span>
                                <span class="tag">CSS</span>
                                <span class="tag">C#</span>
                                <span class="tag">C++</span>
                            </div>
                        </div>
                    </div> --}}
                    @empty($vacancies)
                    <div class="empty-container">{{__("No vacancies yet")}}</div>
                    @else
                    @foreach ($vacancies as $vacancy)
                    <div class="vacancies-block">
                        <a href="{{ route("vacancies-show", $vacancy) }}" class="dark-link">
                            <h4 class="vacancies-name">
                                {{$vacancy->name}}
                            </h4>
                        </a>
                        <div class="vacancies-description">
                            {{$vacancy->description}}
                        </div>

                        <div class="vacancies-down">
                            <div class="vacancies-tags-container">
                                @isset($vacancy->tags)
                                @foreach ($vacancy->tags as $tag)
                                <span class="tag">{{$tag->name}}</span>
                                @endforeach
                                @endisset
                            </div>
                            <div class="vacancies-date">{{$vacancy->getDiffDate()}}</div>
                        </div>
                    </div>
                    @endforeach
                    {{$vacancies->links("vendor.pagination.default")}}
                    @endempty

                </div>
                <div class="filters">
                    <form method="GET" action="{{ route("vacancies-search") }}">
                        <h4 class="filters-header">{{ __("Filter") }}</h4>

                        @csrf
                        <input name="search" type="text" class="filter-search" placeholder="{{ __("Search") }}">

                        <div class="filters-categories">
                            <h4 class="filters-categories-specialization">{{ __("By skills") }}</h4>
                            <div class="filters-categories-container">
                                {{-- <form class="filters-categories-container" method="GET" action="/searchbytag"> --}}
                                @csrf
                                @forelse ($tags as $tag)
                                <div class="filters-category-wrapper filters_category_wrapper">
                                    <input class="filters-category-checkbox" name="tags[]" type="checkbox"
                                        value="{{ $tag->id }}">
                                    <span class="filters-category">{{ $tag->name }}</span>
                                </div>
                                @empty
                                <div class="empty-container">{{__("No tags yet")}}</div>
                                @endforelse
                                {{-- </form> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app>