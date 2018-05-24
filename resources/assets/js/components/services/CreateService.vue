<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="createServiceModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createServiceModalLabel">Добавить услугу</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Наименование:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleService.name" placeholder="Наименование"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Описание:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Описание" v-model="singleService.description" placeholder="Описание"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Наценка:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="number" name="Наценка" v-model="singleService.cost" placeholder="Наценка"/>
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
            services: {
                get() { return this.$store.state.service.services },
                set(value) { return this.$store.state.service.services = value }
            },
            singleService: {
                get() { return this.$store.state.service.singleService },
                set(value) { return this.$store.state.service.singleService = value }
            }
        },

        methods: {
            create() {
                axios.post('/service/create', {
                    singleService: this.singleService
                }).then(response => {
                    this.$store.dispatch('getAllServices');
                    $('#createServiceModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
