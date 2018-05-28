<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleAdminModal" tabindex="-1" role="dialog" aria-labelledby="singleAdminModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createAdminModalLabel">Изменить администратора</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Имя:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="admin_name" v-model="singleAdmin.name" placeholder="Имя" v-validate="'required|max:255'"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Логин:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="login" v-model="singleAdmin.login" placeholder="Логин" v-validate="'required|max:255'"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Пароль:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="password" v-model="singleAdmin.password" placeholder="Пароль" v-validate="'required|max:255'"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 clearfix">
                                <p class="validation-error" v-show="errors.has('admin_name')">поле "имя" не заполнено или имеет неправильный формат</p>
                                <p class="validation-error" v-show="errors.has('login')">поле "логин" не заполнено или имеет неправильный формат</p>
                                <p class="validation-error" v-show="errors.has('password')">поле "пароль" не заполнено или имеет неправильный формат</p>
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
                    this.$notify({
                        title: 'Информация',
                        text: 'Информация о менеджере - обновлена',
                        type: 'warning'
                    });

                    this.$store.dispatch('getAllAdmins');
                    $('#singleAdminModal').modal('hide');
                }).catch(function (error) {});
            }
        }


    }
</script>
