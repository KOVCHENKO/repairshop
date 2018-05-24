<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleOrderModal" tabindex="-1" role="dialog" aria-labelledby="singleOrderModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="singleOrderModalLabel">Изменить данные заказа</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Наименование:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleOrder.name" placeholder="Наименование"/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="update">Изменить</button>
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
            orders: {
                get() { return this.$store.state.order.orders },
                set(value) { return this.$store.state.order.orders = value }
            },
            singleOrder: {
                get() { return this.$store.state.order.singleOrder },
                set(value) { return this.$store.state.order.singleOrder = value }
            }
        },

        methods: {
            update() {
                axios.post('/order/update', {
                    singleOrder: this.singleOrder
                }).then(response => {
                    this.$store.dispatch('getAllOrders');
                    $('#singleOrderModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
