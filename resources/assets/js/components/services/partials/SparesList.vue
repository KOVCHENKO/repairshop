<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="sparesListModal" tabindex="-1" role="dialog"
             aria-labelledby="sparesListModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="sparesListModalLabel">Список расходников</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5 clearfix"><label class="input-title">Необходимое кол-во:</label></div>
                            <div class="col-sm-2 clearfix">
                                <input type="number" name="Кол-во" v-model="$store.state.spare.sparesQuantity" placeholder="Наименование"/>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    /* Компонент - кнопка редактировать (для внутренних исполнителей) */
    Vue.component('actions-spares-add-to-services', {
        template: `<div class="actions relation">
                        <button class="btn btn-success" @click="addSpare">Добавить</button>
                   </div>`,

        data() {
            return {}
        },

        props: ['row'],

        methods: {
            addSpare() {
                axios.get('/spare/add_to_service/' +
                    this.row.id + '/' +
                    this.$store.state.service.singleService.id + '/' +
                    this.$store.state.spare.sparesQuantity
                ).then(response => {
                    this.$store.dispatch('getAllSparesForService', { service_id: this.$store.state.service.singleService.id })
                    $('#sparesListModal').modal('hide');
                }).catch(function (error) {});

            }

        }
    });

    export default {
        created() {
            this.$store.dispatch('getAllSpares');
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: '', component: 'actions-spares-add-to-services'}
                    ]
                }
            }
        },

        computed: {
            spares: {
                get() { return this.$store.state.spare.spares },
                set(value) {  return this.$store.state.spare.spares = value }
            }
        },

        methods: {

        }


    }
</script>
