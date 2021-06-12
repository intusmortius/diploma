<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Vacancy") }}</h2>
            <div class="section-content">
                <div class="vacancy-header-container">
                    <div class="vacancy-title-container">
                        <h3 class="vacancy-title">{{ $vacancy->name }}</h3>
                        @can('update', $vacancy)
                        <div class="vacancy-settings">
                            <a href="{{ route("vacancies-edit", $vacancy) }}">
                                <div class="vacancy-setting">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit"
                                        class="svg-inline--fa fa-edit fa-w-18" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                            <div id="vacancy_show_closure" class="vacancy-setting" data-toggle="modal"
                                data-target="#vacancyDeleteModal" data-vacancy-id="{{$vacancy->id}}">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle"
                                    class="svg-inline--fa fa-times-circle fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="vacancy-author-container">
                        <h4 class="vacancy-author-name">{{ $vacancy->author->name }}</h4>
                        <span class="vacancy-post-date">{{ __("Posted") }} {{ $vacancy->getDiffDate() }}</span>
                    </div>
                </div>
                <div class="vacancy-info-container">
                    @isset($vacancy->description)
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("Description") }}: </h4>
                        <p class="vacancy-info-text">{{ $vacancy->description }}</p>
                    </div>
                    @endisset
                    @isset($vacancy->about_worker)
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("About worker") }}: </h4>
                        <p class="vacancy-info-text">{{ $vacancy->about_worker }}</p>
                    </div>
                    @endisset
                    @isset($vacancy->responsibilities)
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("Responsibilities") }}: </h4>
                        <p class="vacancy-info-text">{{ $vacancy->responsibilities }}</p>
                    </div>
                    @endisset
                    @isset($vacancy->requirements)
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("Requirements") }}: </h4>
                        <p class="vacancy-info-text">{{ $vacancy->requirements }}</p>
                    </div>
                    @endisset
                    @isset($tags)
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("Skills and Expertise") }}: </h4>
                        <div class="vacancy-skills-container">
                            @foreach ($tags as $tag)
                            <div class="tag">{{ $tag->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    @endisset
                </div>
                <div class="vacancy-comments-container">
                    <h4 class="vacancy-comments-title">{{ __("Rate") }}</h4>
                    @can('apply_to_vacancy')
                    <div class="vacancy-comment-add-block">
                        <textarea id="vacancy_comment_add_textarea" name="" id="" cols="30" class="vacancy-comment-add"
                            maxlength="1200" placeholder="{{ __("Add comment") }}"
                            data-vacancy="{{ $vacancy->id }}"></textarea>
                        <button id="vacancy_comment_add_submit" class="btn flare-effect vacancy-comment-add-btn">
                            {{ __("Add comment") }}
                        </button>
                    </div>
                    @endcan
                    <div id="vacancy_comment_list" class="vacancy-comments-list">
                        @forelse ($comments as $comment)
                        <div class="vacancy-comment">
                            <div class="vacancy-comment-name-block">
                                <div class="vacancy-worker-avatar">
                                    <img src="/img/avatar-default.svg" alt="avatar">
                                </div>
                                <div class="vacancy-comment-right">
                                    <div class="vacancy-worker-name">{{ $comment->author->name }}</div>
                                    @can('contact_with_worker')
                                    <form method="post" action="{{ route("chat-with", $comment->author) }}">
                                        @csrf
                                        <button id="{{$comment->author->id}}"
                                            class="btn flare-effect">{{ __("Contact") }}</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            <div class="vacancy-comment-text">
                                {{ $comment->text }}
                            </div>
                            <div class="vacancy-comment-date">{{ __("Posted") }}: {{ $comment->getDiffDate() }}</div>
                        </div>
                        @empty
                        <div class="empty-container">{{__("No comments yet")}}</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>