<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Authorization") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="{{ route('login') }}">
                    @csrf
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
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Log in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>