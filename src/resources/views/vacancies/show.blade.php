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
                    <div class="vacancy-comments-list">
                        <div class="vacancy-comment">
                            <div class="vacancy-comment-name-block">
                                <div class="vacancy-worker-avatar">
                                    <img src="/img/avatar-default.svg" alt="avatar">
                                </div>
                                <div class="vacancy-comment-right">
                                    <div class="vacancy-worker-name">John Coll</div>
                                    <button class="btn flare-effect">{{ __("Contact") }}</button>
                                </div>
                            </div>
                            <div class="vacancy-comment-text">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum mollitia possimus vel
                                earum repellat odit odio voluptates cupiditate perferendis dolor fugit saepe,
                                consectetur distinctio voluptas illum veritatis natus est perspiciatis!
                            </div>
                            <div class="vacancy-comment-date">{{ __("Posted") }}: 9 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>