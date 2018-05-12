<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="spares"
        ></datatable-customized>

        <create-spare></create-spare>
        <single-spare></single-spare>
    </div>
</template>

<script>
    import ActionsSpare from './partials/ActionsSpare';
    import CreateSpare from './CreateSpare';
    import SingleSpare from './SingleSpare';

    export default {
        created() {
            this.$store.dispatch('getAllSpares');

            this.$store.state.managerSetting.subTitle = 'Запчасти / Расходники';
            this.$store.state.managerSetting.buttonAddDisabled = false;
            this.$store.state.managerSetting.buttonAddTitle = 'Добавить запчасть';
            this.$store.state.managerSetting.buttonAddAction = this.createOption;
            this.$store.state.managerSetting.buttonAddDataTarget = '#createSpareModal';
        },

        components: {
            createSpare: CreateSpare,
            singleSpare: SingleSpare
        },

        computed: {
            spares: {
                get() { return this.$store.state.spare.spares },
                set(value) { return this.$store.state.spare.spares = value }
            },
            singleSpare: {
                get() { return this.$store.state.spare.singleSpare },
                set(value) { return this.$store.state.spare.singleSpare = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Стоимость', field: 'cost'},
                        {label: 'Количество', field: 'quantity'},
                        {label: '', component: 'actions-spare'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleSpare.id = 0;
                this.singleSpare.name = '';
                this.singleSpare.cost = 0;
                this.singleSpare.quantity = '';
            }

        }


    }
</script>
