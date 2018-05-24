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
    import ActionsMaster from './partials/ActionsMaster';
    import CreateMaster from './CreateMaster';
    import SingleMaster from './SingleMaster';

    export default {
        created() {
            this.$store.dispatch('getAllMasters');

            this.$store.state.managerSetting.subTitle = 'Мастера';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить мастера';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createMasterModal';
        },

        components: {
            createMaster: CreateMaster,
            singleMaster: SingleMaster
        },

        computed: {
            masters: {
                get() { return this.$store.state.master.masters },
                set(value) { return this.$store.state.master.masters = value }
            },
            singleMaster: {
                get() { return this.$store.state.master.singleMaster },
                set(value) { return this.$store.state.master.singleMaster = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Имя', field: 'name'},
                        {label: 'Должность', field: 'position'},
                        {label: 'Ставка', field: 'rate'},
                        {label: '', component: 'actions-master'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleMaster.id = 0;
                this.singleMaster.name = '';
                this.singleMaster.rate = 0;
                this.singleMaster.position = '';
            }

        }


    }
</script>
