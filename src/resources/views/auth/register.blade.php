<x-app>
    <section class="section">
        <div class="container-fluid">
            <h2 class="section-header">{{ __("Registration") }}</h2>
            <div class="section-content">
                <form id="auth_form" class="auth-form" method="POST" action="{{ route('register') }}"
                    x-data="{role_id: 0}">
                    @csrf

                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Name") }}" name="name" id='name'
                            required />
                        <label for="name" class="form-label">{{ __("Name") }}</label>
                    </div>
                    @error('name')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Email") }}" name="email" id='email'
                            required />
                        <label for="email" class="form-label">{{ __("Email") }}</label>
                    </div>
                    @error('email')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("Password") }}" name="password"
                            id='password' required />
                        <label for="password" class="form-label">{{ __("Password") }}</label>
                    </div>
                    @error('password')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("Confirm password") }}"
                            name="password_confirmation" id='password_confirmation' required />
                        <label for="password_confirmation" class="form-label">{{ __("Confirm password") }}</label>
                    </div>
                    @error('confirm_password')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="sel sel--black-panther">
                        <select name="role_id" id="role_id">
                            <option value="" disabled>Тип</option>
                            <option value="1">Виконавець</option>
                            <option value="2">Замовник</option>
                        </select>
                    </div>
                    @error('role_id')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field" x-show="role_id == 2">
                        <input type="input" class="form-field" placeholder="{{ __("Place of work") }}"
                            name="customer_work_place" id='customer_work_place' />
                        <label for="customer_work_place" class="form-label">{{ __("Place of work") }}</label>
                    </div>
                    @error('customer_work_place')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field" x-show="role_id == 1">
                        <input type="input" class="form-field" placeholder="{{ __("Specialization") }}"
                            name="worker_specialization" id='worker_specialization' />
                        <label for="worker_specialization" class="form-label">{{ __("Specialization") }}</label>
                    </div>
                    @error('worker_specialization')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Sign in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>