<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleOrderModal" tabindex="-1" role="dialog" aria-labelledby="singleOrderModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="singleOrderModalLabel">Данные заказа</h4>
                    </div>
                    <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Стоимость заказа:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <label class="input-title"><h4>{{ this.singleOrder.total_cost }} рублей</h4></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Автомобиль:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <label class="input-title">{{ this.singleOrder.auto.reg_number }}</label>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Используемые услуги:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <p v-for="singleChosenService in this.singleOrder.services">
                                        {{ singleChosenService.name }},
                                        {{ singleChosenService.description }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Запчасти:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <p v-for="singleOrderSpare in this.singleOrder.spares">
                                        Наименование: {{ singleOrderSpare.name }},
                                        Ед.изм: {{ singleOrderSpare.unit }},
                                        Кол-во: {{ singleOrderSpare.order_quantity }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Мастера:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <p v-for="singleChosenMaster in this.singleOrder.masters">
                                        Имя: {{ singleChosenMaster.name }},
                                        Должность: {{ singleChosenMaster.position }},
                                        Задействованные часы: {{ singleChosenMaster.laborHours }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-4 clearfix">
                                    <label class="input-title"><strong>Выполнить до:</strong></label>
                                </div>
                                <div class="col-sm-8 clearfix">
                                    <label class="input-title">{{ this.singleOrder.completion_date }}</label>
                                </div>
                            </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="exportToPdf">экспорт в PDF</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },

        computed: {
            singleOrder: {
                get() { return this.$store.state.order.singleOrder },
                set(value) { return this.$store.state.order.singleOrder = value }
            }
        },

        methods: {
            exportToPdf() {
                window.open(window.location.origin+'/order/export_to_pdf/' + this.singleOrder.id);

                // axios.post('/order/export_to_pdf', {
                //     singleOrder: this.singleOrder
                // }).then(response => {
                //     this.$notify({
                //         title: 'Сообщение',
                //         text: 'Экспорт в pdf завершен',
                //         type: 'warning'
                //     });
                // }).catch(function (error) {});
            }
        }


    }
</script>
