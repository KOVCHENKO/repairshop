<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="customers"
        ></datatable-customized>

        <create-customer></create-customer>
        <single-customer></single-customer>
    </div>
</template>

<script>
    import ActionsCustomer from './partials/ActionsCustomer';
    import CreateCustomer from './CreateCustomer';
    import SingleCustomer from './SingleCustomer';

    export default {
        created() {
            this.$store.dispatch('getAllCustomers');

            this.$store.state.managerSetting.subTitle = 'Клиенты';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить клиента';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createCustomerModal';
        },

        components: {
            createCustomer: CreateCustomer,
            singleCustomer: SingleCustomer
        },

        computed: {
            customers: {
                get() { return this.$store.state.customer.customers},
                set(value) { return this.$store.state.customer.customers = value }
            },
            singleCustomer: {
                get() { return this.$store.state.customer.singleCustomer },
                set(value) { return thisuploadImage.$store.state.customer.singleCustomer = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'Имя', field: 'name'},
                        {label: 'Логин', field: 'login'},
                        {label: 'Пароль', field: 'password'},
                        {label: '', component: 'actions-customer'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleCustomer.id = 0;
                this.singleCustomer.name = '';
                this.singleCustomer.login = '';
                this.singleCustomer.password = '';
            }

        }


    }
</script>
