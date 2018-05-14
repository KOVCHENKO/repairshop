<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="createCustomerModalLabel">Добавить клиента</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Имя:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Имя" v-model="singleCustomer.name" placeholder="Имя"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Логин:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Логин" v-model="singleCustomer.login" placeholder="Логин"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Пароль:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Пароль" v-model="singleCustomer.password" placeholder="Пароль"/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="create">Создать</button>
                        <button type="button" class="btn btn-warning" @click="closeModal">Закрыть</button>
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
            customers: {
                get() { return this.$store.state.customer.customers },
                set(value) { return this.$store.state.customer.customers = value }
            },
            singleCustomer: {
                get() { return this.$store.state.customer.singleCustomer },
                set(value) { return this.$store.state.customer.singleCustomer = value }
            }
        },

        methods: {
            create() {
                axios.post('/customer/create', {
                    singleCustomer: this.singleCustomer
                }).then(response => {
                    this.$store.dispatch('getAllCustomers');
                    $('#createCustomerModal').modal('hide');
                }).catch(function (error) {});
            },

            closeModal() {
                $('#createCustomerModal').modal('hide');
            }
        }


    }
</script>
