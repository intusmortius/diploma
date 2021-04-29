<x-app>
    <section class="section">
        <div class="container-fluid">
            <h2 class="section-header">{{ __("New Vacancy") }}</h2>
            <div class="section-content">
                <form id="auth_form" class="auth-form" method="POST" action="">
                    @csrf

                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Vacancy name") }}" name="name"
                            id='name' required value="{{ old("name") ?? "" }}" />
                        <label for="name" class="form-label">{{ __("Vacancy name") }}</label>
                    </div>
                    @error('name')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <textarea id="description" class="form-field form-field-textarea"
                            placeholder="{{ __("Description") }}" name="description"
                            value="{{ old("description") ?? "" }}"></textarea>
                        <label for="description" class="form-label">{{ __("Description") }}</label>
                    </div>
                    @error('description')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <textarea id="about_worker" class="form-field form-field-textarea"
                            placeholder="{{ __("About worker") }}" name="about_worker"
                            value="{{ old("about_worker") ?? "" }}"></textarea>
                        <label for="about_worker" class="form-label">{{ __("About worker") }}</label>
                    </div>
                    @error('about_worker')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <textarea id="responsibilities	" class="form-field form-field-textarea"
                            placeholder="{{ __("Responsibilities") }}" name="responsibilities	"
                            value="{{ old("responsibilities	") ?? "" }}"></textarea>
                        <label for="responsibilities	" class="form-label">{{ __("Responsibilities") }}</label>
                    </div>
                    @error('responsibilities')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <textarea id="requirements" class="form-field form-field-textarea"
                            placeholder="{{ __("Requirements") }}" name="requirements"
                            value="{{ old("requirements") ?? "" }}"></textarea>
                        <label for="requirements" class="form-label">{{ __("Requirements") }}</label>
                    </div>
                    @error('requirements')
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