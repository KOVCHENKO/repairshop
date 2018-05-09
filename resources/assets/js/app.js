import './bootstrap';
import router from './routes';
import { store } from './store/store';

/* @brief - элементы управления */
import DatatableCustomized from './components/templates/DatatableCustomized.vue';
Vue.component('datatable-customized', DatatableCustomized);

/* @brief Таблица VueJsDatatable */
import DatatableFactory from 'vuejs-datatable';
Vue.use(DatatableFactory);


const app = new Vue({
    el: '#app',
    router: router,
    store:  store
});
