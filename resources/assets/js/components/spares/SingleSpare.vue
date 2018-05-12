<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleSpareModal" tabindex="-1" role="dialog" aria-labelledby="singleSpareModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="singleSpareModalLabel">Изменить данные запчасти</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Имя:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleSpare.name" placeholder="Имя"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Стоимость за единицу:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="number" name="Стоимость" v-model="singleSpare.cost" placeholder="Стоимость"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Кол-во на складе:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Кол-во" v-model="singleSpare.quantity" placeholder="Кол-во"/>
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
            spares: {
                get() { return this.$store.state.spare.spares },
                set(value) { return this.$store.state.spare.spares = value }
            },
            singleSpare: {
                get() { return this.$store.state.spare.singleSpare },
                set(value) { return this.$store.state.spare.singleSpare = value }
            }
        },

        methods: {
            update() {
                axios.post('/spare/update', {
                    singleSpare: this.singleSpare
                }).then(response => {
                    this.$store.dispatch('getAllSpares');
                    $('#singleSpareModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
