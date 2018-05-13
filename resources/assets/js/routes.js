import VueRouter from 'vue-router';

let routes = [

    /* Вход в систему */
    {path: '/', component: require('./components/Login.vue')},

    /* Рабочий стол - администратор */
    {
        path: '/desktop', component: require('./components/main_interface_admin/Desktop.vue'),
        children: [
            {path: '/admins/show', component: require('./components/admins/Show.vue')},     // Администраторы (сотрудники) ремонтной мастерской
            {path: '/masters/show', component: require('./components/masters/Show.vue')},   // Мастера (техники) ремонтной мастерской
            {path: '/spares/show', component: require('./components/spares/Show.vue')},     // Запчасти ремонтной мастерской
            {path: '/services/show', component: require('./components/services/Show.vue')}, // Услуги
        ]
    },

    /* Рабочий стол - обучающийся*/
    {
        path: '/desktop', component: require('./components/main_interface_manager/Desktop.vue'),
        children: [
            {path: '/order/show', component: require('./components/orders/Show.vue')}, // Заказы ремонтной мастерской
        ]
    }


];

const router = new VueRouter({
    routes
});

export default router;
