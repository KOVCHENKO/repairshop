<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleMasterModal" tabindex="-1" role="dialog" aria-labelledby="singleMasterModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="singleMasterModalLabel">Изменить данные мастера</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Имя:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleMaster.name" placeholder="Имя"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Ставка:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleMaster.rate" placeholder="Ставка"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Должность:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Должность" v-model="singleMaster.position" placeholder="Должность"/>
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
            masters: {
                get() { return this.$store.state.master.masters },
                set(value) { return this.$store.state.master.masters = value }
            },
            singleMaster: {
                get() { return this.$store.state.master.singleMaster },
                set(value) { return this.$store.state.master.singleMaster = value }
            }
        },

        methods: {
            update() {
                axios.post('/master/update', {
                    singleMaster: this.singleMaster
                }).then(response => {
                    this.$notify({
                        title: 'Информация',
                        text: 'Информация о мастере - обновлена',
                        type: 'warning'
                    });

                    this.$store.dispatch('getAllMasters');
                    $('#singleMasterModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
