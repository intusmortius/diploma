<x-app>
    <section id="view_vacancies" class="section">
        <div class="container">
            <h2 class="section-header">{{ __("My vacancies") }}</h2>
            <div class="section-content">
                <div class="vacancies-block-container">
                    @forelse ($vacancies as $vacancy)
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
                    @empty
                    <div class="empty-container">{{__("No vacancies yet")}}</div>
                    @endforelse
                    {{$vacancies->links("vendor.pagination.default")}}
                </div>
            </div>
        </div>
    </section>
</x-app>