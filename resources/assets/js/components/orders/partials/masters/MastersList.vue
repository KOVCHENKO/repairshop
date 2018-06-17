<template>
    <div>
        <div class="row">
            <div class="col-sm-4 clearfix">
                <label class="input-title">Задействованные мастера:</label>
            </div>
            <div class="col-sm-8 clearfix">
                <p v-for="singleChosenMaster in chosenMasters">
                    Имя: {{ singleChosenMaster.name }},
                    Должность: {{ singleChosenMaster.position }},
                    Задействованные часы: {{ singleChosenMaster.laborHours }},

                </p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-5 clearfix"><label class="input-title">Часы работы:</label></div>
            <div class="col-sm-2 clearfix">
                <input type="number" min="1" name="часы работы" v-model="$store.state.master.laborHours" placeholder="часы работы"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <datatable-customized
                        :columns="table.columns"
                        :data="masters"
                ></datatable-customized>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('actions-masters-to-order', {
        template: `<div class="actions"><button class="btn btn-primary" @click="choose">Выбрать</button></div>`,
        props: ['row'],
        methods: {
            choose() {
                this.row.laborHours = this.$store.state.master.laborHours;
                this.$store.state.master.chosenMasters.push(this.row);
            },
        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllMasters');
        },

        computed: {
            masters: {
                get() { return this.$store.state.master.masters },
                set(value) { return this.$store.state.master.masters = value }
            },
            singleMaster: {
                get() { return this.$store.state.master.singleMaster },
                set(value) { return this.$store.state.master.singleMaster = value }
            },
            chosenMasters: {
                get() { return this.$store.state.master.chosenMasters },
                set(value) { return this.$store.state.master.chosenMasters = value }
            },
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Имя', field: 'name'},
                        {label: 'Должность', field: 'position'},
                        {label: '', component: 'actions-masters-to-order'}

                    ]
                },
            }
        },

        methods: {

        }


    }
</script>
