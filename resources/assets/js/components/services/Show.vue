<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="masters"
        ></datatable-customized>

        <create-master></create-master>
        <single-master></single-master>
    </div>
</template>

<script>
    import ActionsService from './partials/ActionsService';
    import CreateService from './CreateService';
    import SingleService from './SingleService';

    export default {
        created() {
            this.$store.dispatch('getAllServices');

            this.$store.state.managerSetting.subTitle = 'Услуги';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить услугу';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createServiceModal';
        },

        components: {
            createService: CreateService,
            singleService: SingleService
        },

        computed: {
            services: {
                get() { return this.$store.state.service.services },
                set(value) { return this.$store.state.service.services = value }
            },
            singleService: {
                get() { return this.$store.state.service.singleService },
                set(value) { return this.$store.state.service.singleService = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Описание', field: 'description'},
                        {label: '', component: 'actions-service'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleService.id = 0;
                this.singleService.name = '';
                this.singleService.description = '';
            }

        }


    }
</script>
