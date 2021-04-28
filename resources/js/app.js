/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.Axios = require('axios');
// Vue.use(require('vue-moment'));
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



import Vue from 'vue'
import loading from './components/Loading.vue';
import AppMain from './main/MainApp';
import router from './router'
import swal from 'sweetalert2';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import store from './store/index';
import VueChatScroll from 'vue-chat-scroll';
import VueSession from 'vue-session'
import VModal from 'vue-js-modal'
Vue.use(VModal, { componentName: 'Modal' })
export const EventBus = new Vue();
// Vue.use(VueSweetalert2);
Vue.use(VueChatScroll);
window.swal = swal;

var options = {
    persist: true
}

Vue.use(VueSession, options)

Vue.component('loading', loading);
Vue.component('app-main', AppMain);
Vue.component('v-select', vSelect)
Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
Vue.prototype.$userName = document.querySelector("meta[name='user-name']").getAttribute('content');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;


const app = new Vue({
    el: '#app',
     data: { loading: false },
    router,
    store,
});

router.beforeEach((to, from, next) => {
    app.loading = true
    next()
})

router.afterEach((to, from, next) => {
    setTimeout(() => app.loading = false, 500) // timeout for loading
    next()
})
// Now the app has started!
