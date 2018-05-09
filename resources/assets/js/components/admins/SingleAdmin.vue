<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleAdminModal" tabindex="-1" role="dialog" aria-labelledby="singleAdminModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="createAdminModalLabel">Изменить администратора</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Имя:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleAdmin.name" placeholder="Имя"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Логин:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleAdmin.login" placeholder="Логин"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Пароль:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleAdmin.password" placeholder="Пароль"/>
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
            admins: {
                get() { return this.$store.state.admin.admins },
                set(value) { return this.$store.state.admin.admins = value }
            },
            singleAdmin: {
                get() { return this.$store.state.admin.singleAdmin },
                set(value) { return this.$store.state.admin.singleAdmin = value }
            }
        },

        methods: {
            update() {
                axios.post('/admin/update', {
                    singleAdmin: this.singleAdmin
                }).then(response => {
                    this.$store.dispatch('getAllAdmins');
                    $('#singleAdminModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
