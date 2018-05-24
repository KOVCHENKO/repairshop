<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <datatable-customized
                        :columns="table.columns"
                        :data="customers"
                ></datatable-customized>
            </div>
        </div>
        <!--<div class="row">-->
            <!--<div class="col-sm-4 clearfix"><label class="input-title">Новая клиент:</label></div>-->
            <!--<div class="col-sm-8 clearfix">-->
                <!--<button type="button" class="btn btn-primary" @click="addCustomer">Добавить</button>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-sm-4 clearfix">
                <label class="input-title">Выбранный клиент:</label>
            </div>
            <div class="col-sm-8 clearfix">
                <label class="input-title">{{ chosenCustomer.name }}, {{ chosenCustomer.login }}, {{ chosenCustomer.password }}</label>
            </div>
        </div>

        <create-customer></create-customer>
    </div>
</template>

<script>
    import CreateCustomer from '../customers/CreateCustomer'

    Vue.component('actions-customer-to-order', {
        template: `<div class="actions"><button class="btn btn-primary" @click="choose">Выбрать</button></div>`,
        props: ['row'],
        methods: { choose() { this.$store.state.customer.chosenCustomer = this.row; }, }
    });

    export default {
        components: {
            createCustomer: CreateCustomer
        },

        created() {
            this.$store.dispatch('getAllCustomers');
        },

        computed: {
            customers: {
                get() { return this.$store.state.customer.customers},
                set(value) { return this.$store.state.customer.customers = value }
            },
            singleCustomer: {
                get() { return this.$store.state.customer.singleCustomer },
                set(value) { return thisuploadImage.$store.state.customer.singleCustomer = value }
            },
            chosenCustomer: {
                get() { return this.$store.state.customer.chosenCustomer },
                set(value) { return this.$store.state.customer.chosenCustomer = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'Имя', field: 'name'},
                        {label: 'Логин', field: 'login'},
                        {label: 'Пароль', field: 'password'},
                        {label: '', component: 'actions-customer-to-order'}
                    ]
                },
            }
        },

        methods: {
            addCustomer() {
                this.singleCustomer.id = 0;
                this.singleCustomer.name = '';
                this.singleCustomer.password = '';

                $('#createCustomerModal').modal('show');
            },

            createOption() {

            }

        }


    }
</script>
