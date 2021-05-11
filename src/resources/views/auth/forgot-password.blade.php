<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Forgot password") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="/forgot-password">
                    @csrf
                    <div class="form-icon-wrapper">
                        <img src="/img/key1.svg" alt="key">

                    </div>
                    <h2 class="form-title">
                        {{ __("Please enter the email address to which the password reset link will be sent.") }}
                    </h2>
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
                    @if (session('status'))
                    <div class="alert alert-success">{{ session("status") }}</div>
                    @endif
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Log in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>