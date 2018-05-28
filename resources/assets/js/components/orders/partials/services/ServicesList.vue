<template>
    <div>
        <div class="row">
            <div class="col-sm-4 clearfix"><label class="input-title">Используемые услуги:</label></div>
            <div class="col-sm-8 clearfix">
                <p v-for="singleChosenService in chosenServices">
                    {{ singleChosenService.name }},
                    {{ singleChosenService.description }}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <datatable-customized
                        :columns="table.columns"
                        :data="services"
                ></datatable-customized>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('actions-services-to-order', {
        template: `<div class="actions"><button class="btn btn-primary" @click="choose">Выбрать</button></div>`,
        props: ['row'],
        methods: {
            choose() {
                let self = this;
                /* Проверка - возможно ли добавить запчасти к "услуге" */
                axios.get('/spare/check_if_available_at_store/' + this.row.id).then(response => {
                    if (response.data.result === true) {
                        this.$store.state.service.chosenServices.push(this.row);
                    } else {
                        self.$notify({
                            title: 'Сообщение',
                            text: 'Нет необходимого количества запчастей на складе',
                            type: 'warning'
                        });
                    }
                }).catch(function (error) {});
            },
        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllServices');
        },

        computed: {
            services: {
                get() { return this.$store.state.service.services },
                set(value) { return this.$store.state.service.services = value }
            },
            singleService: {
                get() { return this.$store.state.service.singleService },
                set(value) { return this.$store.state.service.singleService = value }
            },
            chosenServices: {
                get() { return this.$store.state.service.chosenServices },
                set(value) { return this.$store.state.service.chosenServices = value }
            },
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Описание', field: 'description'},
                        {label: 'Наценка (руб.)', field: 'cost'},
                        {label: '', component: 'actions-services-to-order'}

                    ]
                },
            }
        },

        methods: {

        }


    }
</script>
