import AppForm from '../app-components/Form/AppForm';

Vue.component('vacancy-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                author_id:  '' ,
                name:  '' ,
                description:  '' ,
                about_worker:  '' ,
                responsibilities:  '' ,
                requirements:  '' ,
                personal_skills:  '' ,
                
            }
        }
    }

});