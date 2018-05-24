<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="orders"
        ></datatable-customized>

        <create-order></create-order>
        <single-order></single-order>
    </div>
</template>

<script>
    import ActionsOrder from './partials/ActionsOrder';
    import CreateOrder from './CreateOrder';
    import SingleOrder from './SingleOrder';

    export default {
        created() {
            this.$store.dispatch('getAllOrders');


            this.$store.state.managerSetting.subTitle = 'Заказы';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить заказ';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createOrderModal';
        },

        components: {
            createOrder: CreateOrder,
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
                        {label: 'Автомобиль', field: 'auto'},
                        {label: 'Дата завершения', field: 'completion_date'},
                        {label: '', component: 'actions-order'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleOrder.id = 0;
                this.singleOrder.name = '';
                this.singleOrder.auto = '';
                this.singleOrder.completion_date = '';
                this.$store.state.wizardCurrentStep = 0;


                this.$store.state.auto.chosenAuto.id = 0;
                this.$store.state.auto.chosenAuto.brand = '';
                this.$store.state.auto.chosenAuto.vin = '';
                this.$store.state.auto.chosenAuto.reg_number = '';
                this.$store.state.auto.chosenAuto.year = '';
                this.$store.state.auto.chosenAuto.volume = 0;
                this.$store.state.auto.chosenAuto.transmission = '';
            }

        },

        mounted() {
            $('#createOrderModal').modal('show');
        }


    }
</script>
