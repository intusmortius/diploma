<x-app>
    <section class="section">
        <div class="container-fluid">
            <h2 class="section-header">{{ __("Registration") }}</h2>
            <div class="section-content">
                <form class="auth-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Name") }}" name="auth_name"
                            id='auth_name' required />
                        <label for="auth_name" class="form-label">{{ __("Name") }}</label>
                    </div>
                    <div class="form-group field">
                        <input type="input" class="form-field" placeholder="{{ __("Email") }}" name="auth_email"
                            id='auth_email' required />
                        <label for="auth_email" class="form-label">{{ __("Email") }}</label>
                    </div>
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("Password") }}"
                            name="auth_password" id='auth_password' required />
                        <label for="auth_password" class="form-label">{{ __("Password") }}</label>
                    </div>
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("Confirm password") }}"
                            name="auth_confirm_password" id='auth_confirm_password' required />
                        <label for="auth_confirm_password" class="form-label">{{ __("Confirm password") }}</label>
                    </div>
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Sign in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>