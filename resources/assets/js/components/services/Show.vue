<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="services"
        ></datatable-customized>

        <create-service></create-service>
        <single-service></single-service>
        <spares-list></spares-list>

    </div>
</template>

<script>
    import ActionsService from './partials/ActionsService';
    import CreateService from './CreateService';
    import SingleService from './SingleService';
    import SparesList from './partials/SparesList';

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
            singleService: SingleService,
            sparesList: SparesList
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
                        {label: 'Наценка (руб.)', field: 'cost'},
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
