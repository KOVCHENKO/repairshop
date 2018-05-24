<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <datatable-customized
                        :columns="table.columns"
                        :data="autos"
                ></datatable-customized>
            </div>
        </div>
        <!--<div class="row">-->
            <!--<div class="col-sm-4 clearfix"><label class="input-title">Новая машина:</label></div>-->
            <!--<div class="col-sm-8 clearfix">-->
                <!--<button type="button" class="btn btn-primary" @click="addAuto">Добавить</button>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-sm-4 clearfix">
                <label class="input-title">Выбранная машина:</label>
            </div>
            <div class="col-sm-8 clearfix">
                <label class="input-title">{{ chosenAuto.brand }} {{ chosenAuto.reg_number }}</label>
            </div>
        </div>

        <create-auto></create-auto>
    </div>
</template>

<script>
    import CreateAuto from '../autos/CreateAuto'

    Vue.component('actions-auto-to-order', {
        template: `<div class="actions"><button class="btn btn-primary" @click="choose" data-target="#singleOrderModal">Выбрать</button></div>`,
        props: ['row'],
        methods: { choose() { this.$store.state.auto.chosenAuto = this.row; }, }
    });

    export default {
        components: {
            createAuto: CreateAuto
        },

        created() {
            this.$store.dispatch('getAllAutos');
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
            chosenAuto: {
                get() { return this.$store.state.auto.chosenAuto },
                set(value) { return this.$store.state.auto.chosenAuto = value }
            }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'Марка', field: 'brand'},
                        {label: 'Vin', field: 'vin'},
                        {label: 'Рег.номер', field: 'reg_number'},
                        {label: '', component: 'actions-auto-to-order'}
                    ]
                },
            }
        },

        methods: {
            addAuto() {
                this.singleAuto.id = 0;
                this.singleAuto.vin = '';
                this.singleAuto.reg_number = '';
                this.singleAuto.year = '';
                this.singleAuto.volume = '';
                this.singleAuto.transmission = '';
                this.singleAuto.image = '';
                this.singleAuto.brand = '';

                $('#createAutoModal').modal('show');
            },

            createOption() {

            }

        }


    }
</script>
