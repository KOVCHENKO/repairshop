import Vue from 'vue';

/* Vue router */
import VueRouter from 'vue-router';
window.Vue = Vue;
Vue.use(VueRouter);

/* Vue validation */
import VeeValidate, { Validator } from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
Validator.localize('ru', ru);
Vue.use(VeeValidate, {
    fieldsBagName: 'formFields'
});

/* Компонент для уведомлений (шаблон <notifications></notifications> находится в manager/TopMenuStudent.vue) */
import Notifications from 'vue-notification';
Vue.use(Notifications);

/* Vue good wiard - мастер действий */
import VueGoodWizard from 'vue-good-wizard';
Vue.use(VueGoodWizard);

window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}