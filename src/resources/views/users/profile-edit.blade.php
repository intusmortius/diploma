<x-app>
    <section class="section">
        <div class="container-fluid">
            <h2 class="section-header">{{ __("Edit") }}</h2>
            <div class="section-content">
                <form id="auth_form" class="auth-form" method="POST" action="{{ route('workers-update', $user) }}">
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
                        <input type="input" class="form-field" placeholder="{{ __("Skills") }}" name="worker_skills"
                            id='worker_skills' />
                        <label for="worker_skills" class="form-label">{{ __("Skills") }}</label>
                    </div>
                    @error('worker_skills')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field"">
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