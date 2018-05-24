<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleServiceModal" tabindex="-1" role="dialog" aria-labelledby="singleServiceModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="singleServiceModalLabel">Информация об услуге</h4>
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

                        <hr>

                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Добавить расходник:</label></div>
                            <div class="col-sm-8 clearfix">
                                <button type="button" class="btn btn-primary" @click="addSparePart">Добавить</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Используемые запчасти:</label></div>
                            <div class="col-sm-8 clearfix">
                                <p v-for="singleSpare in sparesOfService">
                                    {{ singleSpare.name }},
                                    {{ singleSpare.quantity }},
                                    {{ singleSpare.unit }},
                                    <a href="#" @click="deleteSpareFromService(singleSpare)">Удалить</a>
                                    <br>
                                </p>
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
        created() {

        },

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
            },
            sparesOfService: {
                get() { return this.$store.state.spare.sparesOfService },
                set(value) { return this.$store.state.sparex.sparesOfService = value }
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
            },

            addSparePart() {
                $('#sparesListModal').modal('show');
            },

            deleteSpareFromService(singleSpare) {
                axios.get('/spare/delete_spares_from_service/' + singleSpare.id).then(response => {
                    this.$store.dispatch('getAllSparesForService', { service_id: this.singleService.id })
                }).catch(function (error) {});
            }

        }


    }
</script>
