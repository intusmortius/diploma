<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.user.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email_verified_at'), 'has-success': fields.email_verified_at && fields.email_verified_at.valid }">
    <label for="email_verified_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.email_verified_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.email_verified_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('email_verified_at'), 'form-control-success': fields.email_verified_at && fields.email_verified_at.valid}" id="email_verified_at" name="email_verified_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('email_verified_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email_verified_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
    <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.password') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}" id="password" name="password" placeholder="{{ trans('admin.user.columns.password') }}" ref="password">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.password_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('admin.user.columns.password') }}" data-vv-as="password">
        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password_confirmation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('two_factor_secret'), 'has-success': fields.two_factor_secret && fields.two_factor_secret.valid }">
    <label for="two_factor_secret" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.two_factor_secret') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.two_factor_secret" v-validate="''" id="two_factor_secret" name="two_factor_secret"></textarea>
        </div>
        <div v-if="errors.has('two_factor_secret')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('two_factor_secret') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('two_factor_recovery_codes'), 'has-success': fields.two_factor_recovery_codes && fields.two_factor_recovery_codes.valid }">
    <label for="two_factor_recovery_codes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.two_factor_recovery_codes') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.two_factor_recovery_codes" v-validate="''" id="two_factor_recovery_codes" name="two_factor_recovery_codes"></textarea>
        </div>
        <div v-if="errors.has('two_factor_recovery_codes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('two_factor_recovery_codes') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('worker_specialization'), 'has-success': fields.worker_specialization && fields.worker_specialization.valid }">
    <label for="worker_specialization" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.worker_specialization') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.worker_specialization" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('worker_specialization'), 'form-control-success': fields.worker_specialization && fields.worker_specialization.valid}" id="worker_specialization" name="worker_specialization" placeholder="{{ trans('admin.user.columns.worker_specialization') }}">
        <div v-if="errors.has('worker_specialization')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('worker_specialization') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('worker_group'), 'has-success': fields.worker_group && fields.worker_group.valid }">
    <label for="worker_group" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.worker_group') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.worker_group" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('worker_group'), 'form-control-success': fields.worker_group && fields.worker_group.valid}" id="worker_group" name="worker_group" placeholder="{{ trans('admin.user.columns.worker_group') }}">
        <div v-if="errors.has('worker_group')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('worker_group') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('worker_cathedra'), 'has-success': fields.worker_cathedra && fields.worker_cathedra.valid }">
    <label for="worker_cathedra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.worker_cathedra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.worker_cathedra" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('worker_cathedra'), 'form-control-success': fields.worker_cathedra && fields.worker_cathedra.valid}" id="worker_cathedra" name="worker_cathedra" placeholder="{{ trans('admin.user.columns.worker_cathedra') }}">
        <div v-if="errors.has('worker_cathedra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('worker_cathedra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('worker_faculty'), 'has-success': fields.worker_faculty && fields.worker_faculty.valid }">
    <label for="worker_faculty" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.worker_faculty') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.worker_faculty" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('worker_faculty'), 'form-control-success': fields.worker_faculty && fields.worker_faculty.valid}" id="worker_faculty" name="worker_faculty" placeholder="{{ trans('admin.user.columns.worker_faculty') }}">
        <div v-if="errors.has('worker_faculty')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('worker_faculty') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('customer_work_place'), 'has-success': fields.customer_work_place && fields.customer_work_place.valid }">
    <label for="customer_work_place" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.customer_work_place') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.customer_work_place" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('customer_work_place'), 'form-control-success': fields.customer_work_place && fields.customer_work_place.valid}" id="customer_work_place" name="customer_work_place" placeholder="{{ trans('admin.user.columns.customer_work_place') }}">
        <div v-if="errors.has('customer_work_place')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('customer_work_place') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('about'), 'has-success': fields.about && fields.about.valid }">
    <label for="about" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.user.columns.about') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.about" v-validate="''" id="about" name="about"></textarea>
        </div>
        <div v-if="errors.has('about')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('about') }}</div>
    </div>
</div>


