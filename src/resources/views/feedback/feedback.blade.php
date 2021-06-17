<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Feedback") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="/forgot-password">
                    @csrf
                    <div class="form-icon-wrapper">
                        <img src="/img/feedback.svg" alt="key">
                    </div>
                    <h2 class="form-title">
                        {{ __("Please enter the message you would like to be send:") }}
                    </h2>
                    <div class="form-group field">
                        <textarea id="message" class="form-field form-field-textarea" placeholder="{{ __("Message") }}"
                            name="message" value="{{ old("message") ?? "" }}"></textarea>
                        <label for="message" class="form-label">{{ __("Message") }}</label>
                    </div>
                    @error('email')
                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if (session('status'))
                    <div class="alert alert-success">{{ session("status") }}</div>
                    @endif
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Send") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>