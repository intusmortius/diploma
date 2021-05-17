
import './_config';

window.Vue = require('vue').default;



window._ = require('lodash')
window.Popper = require('popper.js').default
// Pusher
window.Pusher = require('pusher-js')



try {
  window.$ = window.jQuery = require('jquery')

  require('bootstrap')
} catch (e) {
}

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'


let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}



Vue.component('chat-application', require('./components/ChatApplication.vue').default)
Vue.component('resizable-textarea', require('./components/ResizableTextarea.vue').default)

if(document.head.querySelector('meta[name="userID"]') && document.querySelector('#view_chat')){
  const app = new Vue({
      el: '#view_chat',
      data: {
        userID: null
      },
      mounted () {
        // Assign the ID from meta tag for future use in application
        
          this.userID = document.head.querySelector('meta[name="userID"]').content
        
      }
  })
}
