<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Reset password") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="/reset-password">
                    @csrf
                    <div class="form-icon-wrapper">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="redo"
                            class="svg-inline--fa fa-redo fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M500.33 0h-47.41a12 12 0 0 0-12 12.57l4 82.76A247.42 247.42 0 0 0 256 8C119.34 8 7.9 119.53 8 256.19 8.1 393.07 119.1 504 256 504a247.1 247.1 0 0 0 166.18-63.91 12 12 0 0 0 .48-17.43l-34-34a12 12 0 0 0-16.38-.55A176 176 0 1 1 402.1 157.8l-101.53-4.87a12 12 0 0 0-12.57 12v47.41a12 12 0 0 0 12 12h200.33a12 12 0 0 0 12-12V12a12 12 0 0 0-12-12z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="form-title align-center">
                        {{ __("Please enter a new password.") }}
                    </h2>
                    <input id="token" name="token" type="hidden" value="{{ request()->route('token') }}">

                    <input type="hidden" class="form-field" placeholder="{{ __("Email") }}" name="email" id='email'
                        value="{{ $request->email }}" required />

                    @error('email')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("New password") }}" name="password"
                            id='password' required />
                        <label for="password" class="form-label">{{ __("New password") }}</label>
                    </div>
                    @error('password')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group field">
                        <input type="password" class="form-field" placeholder="{{ __("Confirm new password") }}"
                            name="password_confirmation" id='password_confirmation' required />
                        <label for="password_confirmation" class="form-label">{{ __("Confirm new password") }}</label>
                    </div>
                    @error('password_confirmation')
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