<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Authorization") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <div class="form-icon-wrapper">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="unlock-alt"
                            class="svg-inline--fa fa-unlock-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M400 256H152V152.9c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v16c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-16C376 68 307.5-.3 223.5 0 139.5.3 72 69.5 72 153.5V256H48c-26.5 0-48 21.5-48 48v160c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zM264 408c0 22.1-17.9 40-40 40s-40-17.9-40-40v-48c0-22.1 17.9-40 40-40s40 17.9 40 40v48z">
                            </path>
                        </svg>
                    </div> --}}
                    {{-- <h2 class="form-title align-center">
                        {{ __("Please enter a new password.") }}
                    </h2> --}}
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
                    <div class="form-forgot-password"><a href="/forgot-password">Forgot password</a></div>
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Log in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>