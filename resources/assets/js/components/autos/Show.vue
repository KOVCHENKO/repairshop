<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="autos"
        ></datatable-customized>

        <create-auto></create-auto>
        <single-auto></single-auto>
    </div>
</template>

<script>
    import ActionsAdmin from './partials/ActionsAuto';
    import CreateAuto from './CreateAuto';
    import SingleAuto from './SingleAuto';

    export default {
        created() {
            this.$store.dispatch('getAllAutos');

            this.$store.state.managerSetting.subTitle = 'Автомобили';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить авто';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createAutoModal';
        },

        components: {
            createAuto: CreateAuto,
            singleAuto: SingleAuto
        },

        computed: {
            autos: {
                get() { return this.$store.state.auto.autos},
                set(value) { return this.$store.state.auto.autos = value }
            },
            singleAuto: {
                get() { return this.$store.state.auto.singleAuto },
                set(value) { return this.$store.state.auto.singleAuto = value }
            },
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'Марка', field: 'brand'},
                        {label: 'Vin', field: 'vin'},
                        {label: 'Рег.номер', field: 'reg_number'},
                        {label: '', component: 'actions-auto'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleAuto.id = 0;
                this.singleAuto.vin = '';
                this.singleAuto.reg_number = '';
                this.singleAuto.year = '';
                this.singleAuto.volume = '';
                this.singleAuto.transmission = '';
                this.singleAuto.image = '';
                this.singleAuto.brand = '';

                $('#createAutoModal').modal('show');
            }

        }


    }
</script>
