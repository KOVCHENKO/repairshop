<template>
    <div>
        <div class="row">
            <div class="col-sm-4 clearfix">
                <label class="input-title">Необходимые запчасти:</label>
            </div>
            <div class="col-sm-8 clearfix">
                <p v-for="singleChosenSpare in chosenSpares">
                    Наименование: {{ singleChosenSpare.name }},
                    Ед.изм: {{ singleChosenSpare.unit }},
                    Кол-во: {{ singleChosenSpare.sparesForOrder }},
                </p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-5 clearfix"><label class="input-title">Кол-во под заказ:</label></div>
            <div class="col-sm-2 clearfix">
                <input type="number" name="часы работы" v-model="$store.state.spare.sparesForOrder" placeholder="Необходимые запчасти"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <datatable-customized
                        :columns="table.columns"
                        :data="spares"
                ></datatable-customized>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('actions-spares-to-order', {
        template: `<div class="actions"><button class="btn btn-primary" @click="choose">Выбрать</button></div>`,
        props: ['row'],
        methods: {
            choose() {
                let self = this;
                this.row.sparesForOrder = this.$store.state.spare.sparesForOrder;

                /* Проверка - возможно ли добавить запчасти к "услуге" */
                axios.get('/spare/check_if_single_available_at_store/' + this.row.id + '/' + this.$store.state.spare.sparesForOrder).then(response => {
                    if (response.data.result === true) {
                        let spareIndex = this.$store.state.spare.spares.findIndex(x => x.id === this.row.id);
                        this.$store.state.spare.spares.splice(spareIndex, 1);
                        this.$store.state.spare.chosenSpares.push(this.row);
                    } else {
                        self.$notify({
                            title: 'Сообщение',
                            text: 'Нет необходимого количества запчастей на складе',
                            type: 'warning'
                        });
                    }
                }).catch(function (error) {});
            }
        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllSpares');
        },

        computed: {
            spares: {
                get() { return this.$store.state.spare.spares },
                set(value) { return this.$store.state.spare.spares = value }
            },

            singleSpare: {
                get() { return this.$store.state.spare.singleSpare },
                set(value) { return this.$store.state.spare.singleSpare = value }
            },

            chosenSpares: {
                get() { return this.$store.state.spare.chosenSpares },
                set(value) { return this.$store.state.spare.chosenSpares = value }
            },
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Ед.изм', field: 'unit'},
                        {label: 'Кол-во на складе', field: 'quantity'},
                        {label: '', component: 'actions-spares-to-order'}

                    ]
                },
            }
        },

        methods: {

        }


    }
</script>
