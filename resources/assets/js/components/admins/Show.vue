<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="admins"
        ></datatable-customized>

        <create-admin></create-admin>
        <single-admin></single-admin>
    </div>
</template>

<script>
    import ActionsAdmin from './partials/ActionsAdmin';
    import CreateAdmin from './CreateAdmin';
    import SingleAdmin from './SingleAdmin';

    export default {
        created() {
            this.$store.dispatch('getAllAdmins');

            this.$store.state.managerSetting.subTitle = 'Администраторы системы';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить администратора';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createAdminModal';
        },

        components: {
            createAdmin: CreateAdmin,
            singleAdmin: SingleAdmin
        },

        computed: {
            admins: {
                get() { return this.$store.state.admin.admins },
                set(value) { return this.$store.state.admin.admins = value }
            },
            singleAdmin: {
                get() { return this.$store.state.admin.singleAdmin },
                set(value) { return this.$store.state.admin.singleAdmin = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Имя', field: 'name'},
                        {label: 'Логин', field: 'login'},
                        {label: 'Пароль', field: 'password'},
                        {label: '', component: 'actions-admin'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleAdmin.name = '';
                this.singleAdmin.login = 0;
                this.singleAdmin.password = '';
            }

        }


    }
</script>
