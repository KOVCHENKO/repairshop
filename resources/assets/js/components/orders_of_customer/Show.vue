<template>
    <div>
        <h4>Мои заказы</h4>

        <datatable-customized
                :columns="table.columns"
                :data="orders"
        ></datatable-customized>

        <single-order></single-order>
    </div>
</template>

<script>
    import SingleOrder from './SingleOrder';

    Vue.component('actions-order-for-customer', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleOrderModal">Показать</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleOrder', { order_id: this.row.id });
            },
        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllOrdersOfCustomer');
            this.createOption();

            this.$store.state.managerSetting.subTitle = 'Заказы';
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
                        {label: '', component: 'actions-order-for-customer'}
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
