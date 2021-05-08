<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Vacancy") }}</h2>
            <div class="section-content">
                <div class="vacancy-header-container">
                    <div class="vacancy-title-container">
                        <h3 class="vacancy-title">{{ $vacancy->name }}</h3>
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
                    <div class="vacancy-info-block">
                        <h4 class="vacancy-info-title">{{ __("Skills and Expertise") }}: </h4>
                        <div class="vacancy-skills-container">
                            <div class="tag">Js</div>
                            <div class="tag">Design</div>
                            <div class="tag">C++</div>
                            <div class="tag">PHP</div>
                        </div>
                    </div>
                </div>
                <div class="vacancy-comments-container">
                    <h4 class="vacancy-comments-title">{{ __("Rate") }}</h4>
                    <div class="vacancy-comment-add-block">
                        <textarea id="vacancy_comment_add_textarea" name="" id="" cols="30" class="vacancy-comment-add"
                            maxlength="1200" placeholder="{{ __("Add comment") }}"
                            data-vacancy="{{ $vacancy->id }}"></textarea>
                        <button id="vacancy_comment_add_submit" class="btn flare-effect vacancy-comment-add-btn">
                            {{ __("Add comment") }}
                        </button>
                    </div>
                    <div id="vacancy_comment_list" class="vacancy-comments-list">
                        @forelse ($comments as $comment)
                        <div class="vacancy-comment">
                            <div class="vacancy-comment-name-block">
                                <div class="vacancy-worker-avatar">
                                    <img src="/img/avatar-default.svg" alt="avatar">
                                </div>
                                <div class="vacancy-comment-right">
                                    <div class="vacancy-worker-name">{{ $comment->author->name }}</div>
                                    <button class="btn flare-effect">{{ __("Contact") }}</button>
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