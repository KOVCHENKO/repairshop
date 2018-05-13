<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleServiceModal" tabindex="-1" role="dialog" aria-labelledby="singleServiceModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="singleServiceModalLabel">Изменить данные услуги</h4>
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
            update() {
                axios.post('/service/update', {
                    singleService: this.singleService
                }).then(response => {
                    this.$store.dispatch('getAllServices');
                    $('#singleServiceModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
