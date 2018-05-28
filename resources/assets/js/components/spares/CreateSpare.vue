<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="createSpareModal" tabindex="-1" role="dialog" aria-labelledby="createSpareModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createSpareModalLabel">Добавить запчасти</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Наименование:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleSpare.name" placeholder="Наименование"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Стоимость:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="number" name="Стоимость" v-model="singleSpare.cost" placeholder="Стоимость"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Количество:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Количество" v-model="singleSpare.quantity" placeholder="Кол-во"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Ед.изм</label></div>
                            <div class="col-sm-8 clearfix"><select name="type" v-model="singleSpare.unit" class="form-control">
                                <option value="л">л</option>
                                <option value="кг">кг</option>
                                <option value="шт">шт</option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="create">Создать</button>
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
            create() {
                axios.post('/spare/create', {
                    singleSpare: this.singleSpare
                }).then(response => {
                    this.$notify({
                        title: 'Информация',
                        text: 'Новая запчасть - добавлена в систему',
                        type: 'warning'
                    });

                    this.$store.dispatch('getAllSpares');
                    $('#createSpareModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
