<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="orders"
        ></datatable-customized>

        <single-order></single-order>
    </div>
</template>

<script>
    import SingleOrder from './SingleOrder';

    Vue.component('actions-order-for-superadmin', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleOrderModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleOrder', { order_id: this.row.id });
            },

            remove() {
                axios.get('/order/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllSuperAdminOrders');
                }).catch(function (error) {});
            }
        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllSuperAdminOrders');
            this.createOption();

            this.$store.state.managerSetting.subTitle = 'Все заказы';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить заказ';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createOrderModal';
        },

        components: {
            singleOrder: SingleOrder
        },

        computed: {
            orders: {
                get() { return this.$store.state.order.orders },
                set(value) { return this.$store.state.order.orders = value }
            },
            singleOrder: {
                get() { return this.$store.state.order.singleOrder },
                set(value) { return this.$store.state.order.singleOrder = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Рег. номер авто', field: 'auto.reg_number'},
                        {label: 'Имя клиента', field: 'customer.name'},
                        {label: 'Дата завершения', field: 'completion_date'},
                        {label: 'Статус', field: 'status'},
                        {label: '', component: 'actions-order-for-superadmin'}
                    ]
                },
            }
        },

        methods: {
            createOption() {

            }

        },

        mounted() {
            $('#createOrderModal').modal('show');
        }


    }
</script>
