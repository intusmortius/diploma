<x-app>
    <section class="section">
        <div class="container-fluid">
            <h2 class="section-header">{{ __("Registration") }}</h2>
            <div class="section-content">
                <form id="auth_form" class="auth-form" method="POST" action="{{ route('register') }}"
                    x-data="{role_id: 'worker'}">
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
                    <div class="sel sel--black-panther">
                        <select name="select-role" id="select-role">
                            <option value="" disabled>Тип</option>
                            <option value="worker">Виконавець</option>
                            <option value="customer">Замовник</option>
                        </select>
                    </div>
                    <div class="form-group field" x-show="role_id == 'customer'">
                        <input type="input" class="form-field" placeholder="{{ __("Place of work") }}"
                            name="auth_work_place" id='auth_work_place' required />
                        <label for="auth_work_place" class="form-label">{{ __("Place of work") }}</label>
                    </div>
                    <div class="form-group field" x-show="role_id == 'customer'">
                        <input type="input" class="form-field" placeholder="{{ __("Company") }}"
                            name="auth_company_place" id='auth_company_place' required />
                        <label for="auth_company_place" class="form-label">{{ __("Company") }}</label>
                    </div>
                    <div class="form-group field" x-show="role_id == 'worker'">
                        <input type="input" class="form-field" placeholder="{{ __("Specialization") }}"
                            name="auth_specialization" id='auth_specialization' required />
                        <label for="auth_specialization" class="form-label">{{ __("Specialization") }}</label>
                    </div>

                    <div class="form-submit"><button class="btn flare-effect">{{ __("Sign in") }}</button></div>
                </form>
            </div>
        </div>
    </section>
</x-app>