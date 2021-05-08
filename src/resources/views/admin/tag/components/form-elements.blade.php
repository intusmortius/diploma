<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tag.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.tag.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slag'), 'has-success': fields.slag && fields.slag.valid }">
    <label for="slag" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tag.columns.slag') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slag" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slag'), 'form-control-success': fields.slag && fields.slag.valid}" id="slag" name="slag" placeholder="{{ trans('admin.tag.columns.slag') }}">
        <div v-if="errors.has('slag')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('slag') }}</div>
    </div>
</div>


