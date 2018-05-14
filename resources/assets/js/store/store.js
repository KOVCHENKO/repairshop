import Vuex from 'vuex';

import admin from './modules/admin';
import master from './modules/master';
import spare from './modules/spare';
import order from './modules/order';
import service from './modules/service';
import auto from './modules/auto';
import customer from './modules/customer';

export const store = new Vuex.Store({
    state: {

        /* Глобальные модальные окна */
        sureModal: {
            title: 'Вы уверены?',
            text: 'Вы уверены?',
            action: function() { },
            cancel: function() { }
        },

        /* Глобальные переменные */
        managerSetting: {
            buttonAddAction: function() { },            // Действие на круглой красной кнопке ПЛЮС
            buttonAddDataTarget: '',                    // Значение data-target для круглой красной кнопки ПЛЮС
            subTitle: '',                               // Подзаголовок
            buttonAddDisabled: false,                   // Доступность кнопки добавления нового элемента справочника
            buttonAddTitle: 'Добавить новый Кабинет',   // Подсказка на кнопке добавления нового Элемента справочника
            leftMenuShow: false,                        // Состояние левого меню,
            commerceMenuShow: false,                    // Состояние коммерческого меню,
            rightContentShow: false,                    //Отображать ли правый блок
        },

        studentSetting : {
            typeOfTest: '',
            subTitle: ''
        },

        /* Переменные текущего состояния (школа, класс) */
        currentState: {
            school: {
                name: '',
                id: 0
            },
            class: {
                name: '',
                id: 0
            }
        },

    },

    modules: {
        admin,   // Администраторы (сотрудники системы)
        master,  // Мастера (ремонтники системы)
        spare,   // Запчасти
        order,   // Заказы
        service, // услуги
        auto,    // Автомобили
        customer // Клиенты
    }

});
