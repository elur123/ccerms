//All imports
import VueRouter from 'vue-router';
import store from './store';
import moment from 'moment';
import Swal from 'sweetalert2'
// import App from './App.vue';
import routes from './routes';
import VueFormWizard from 'vue-form-wizard'
import VueConfetti from 'vue-confetti'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'


require('./bootstrap');
window.Vue = require('vue');
window.moment = require('moment');
window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
})

window.toast = toast;

//laravel-vue-pagination
Vue.component('pagination', require('laravel-vue-pagination'))

//All Components
Vue.component('research-list', require('./components/ResearchList.vue').default);

//All Vue Use
Vue.use(VueRouter);
Vue.use(VueFormWizard);
Vue.use(VueConfetti);

const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
    store,
    router,
    // render: h => h(App)
}).$mount('#app');
