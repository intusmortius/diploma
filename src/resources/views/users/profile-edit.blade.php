<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Edit") }}</h2>
            <div class="section-content">
                <form id="" class="form-block" method="POST" action="{{ route('workers-update', $user) }}">
                    @csrf

                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Name") }}" name="name" id='name'
                            required value="{{ old("name") ?? $user->name ?? "" }}" />
                        <label for="name" class="form-label">{{ __("Name") }}</label>
                    </div>
                    @error('name')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Group") }}" name="worker_group"
                            id='worker_group' value="{{ old("worker_group") ?? $user->worker_group ?? "" }}" />
                        <label for="worker_group" class="form-label">{{ __("Group") }}</label>
                    </div>
                    @error('worker_group')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Cathedra") }}" name="worker_cathedra"
                            id='worker_cathedra' value="{{ old("worker_cathedra") ?? $user->worker_cathedra ?? "" }}" />
                        <label for="worker_cathedra" class="form-label">{{ __("Cathedra") }}</label>
                    </div>
                    @error('worker_cathedra')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Faculty") }}" name="worker_faculty"
                            id='worker_faculty' value="{{ old("worker_faculty") ?? $user->worker_faculty ?? "" }}" />
                        <label for="worker_faculty" class="form-label">{{ __("Faculty") }}</label>
                    </div>
                    @error('worker_faculty')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <div class="tag-input-container">
                            <div class="tag-input-wrapper">
                                <div class="tag-input-label">
                                    <label for="">{{ __("Skills") }} (separate with spaces)</label>
                                </div>
                                <div id="tag_input_wrapper" class="tag-input">
                                    <ul id="tag_container" class="tag-input-selected-tags">
                                        @isset($tags)
                                        @foreach ($tags as $tag)
                                        <li class="tag-input-item tag_input_item">
                                            <input type="checkbox" name="tags[]" value="{{ $tag->name }}"
                                                class="tag-checkbox" checked>
                                            <span class="tag-input-item-name">{{ $tag->name }}</span>
                                            <button type="button" class="tag-input-item-btn tag_remove_btn">
                                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.77812 0.707076C8.16865 0.316552 8.80181 0.316552 9.19234 0.707077V0.707077C9.58286 1.0976 9.58286 1.73077 9.19234 2.12129L2.12127 9.19236C1.73075 9.58288 1.09758 9.58288 0.707056 9.19236V9.19236C0.316532 8.80183 0.316532 8.16867 0.707056 7.77814L7.77812 0.707076Z"
                                                        fill="white" />
                                                    <rect y="1.70706" width="2" height="12" rx="1"
                                                        transform="rotate(-45 0 1.70706)" fill="white" />
                                                </svg>
                                            </button>
                                        </li>
                                        @endforeach
                                        @endisset
                                    </ul>
                                    <input id="tag_input_field" type="text" class="tag-input-field" autocomplete="off">
                                    <ul id="suggested_tag_list" class="suggested-tag-list hide">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group field">
                        <textarea id=" about" class="form-field form-field-textarea" placeholder="{{ __("About") }}"
                            name="about" value="{{ old("about") ?? $user->about ?? "" }}"></textarea>
                        <label for="about" class="form-label">{{ __("About") }}</label>
                    </div>
                    @error('about')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Edit") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>