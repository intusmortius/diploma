<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('author_id'), 'has-success': fields.author_id && fields.author_id.valid }">
    <label for="author_id" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.author_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.author_id" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('author_id'), 'form-control-success': fields.author_id && fields.author_id.valid}"
            id="author_id" name="author_id" placeholder="{{ trans('admin.vacancy.columns.author_id') }}">
        <div v-if="errors.has('author_id')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('author_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
            id="name" name="name" placeholder="{{ trans('admin.vacancy.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.description') }}</label>
<div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
    <div>
        <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description"
            :config="mediaWysiwygConfig"></wysiwyg>
    </div>
    <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>
        @{{ errors.first('description') }}</div>
</div>
</div> --}}

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.description" v-validate="''" id="description"
                name="description"></textarea>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('about_worker'), 'has-success': fields.about_worker && fields.about_worker.valid }">
    <label for="about_worker" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.about_worker') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.about_worker" v-validate="''" id="about_worker"
                name="about_worker"></textarea>
        </div>
        <div v-if="errors.has('about_worker')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('about_worker') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('responsibilities'), 'has-success': fields.responsibilities && fields.responsibilities.valid }">
    <label for="responsibilities" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.responsibilities') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.responsibilities" v-validate="''" id="responsibilities"
                name="responsibilities"></textarea>
        </div>
        <div v-if="errors.has('responsibilities')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('responsibilities') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('requirements'), 'has-success': fields.requirements && fields.requirements.valid }">
    <label for="requirements" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.requirements') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.requirements" v-validate="''" id="requirements"
                name="requirements"></textarea>
        </div>
        <div v-if="errors.has('requirements')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('requirements') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('personal_skills'), 'has-success': fields.personal_skills && fields.personal_skills.valid }">
    <label for="personal_skills" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacancy.columns.personal_skills') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.personal_skills" v-validate="''" id="personal_skills"
                name="personal_skills"></textarea>
        </div>
        <div v-if="errors.has('personal_skills')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('personal_skills') }}</div>
    </div>
</div>