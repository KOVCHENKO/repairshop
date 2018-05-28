<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="singleCustomerModal" tabindex="-1" role="dialog" aria-labelledby="singleCustomerModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="singleCustomerModalLabel">Информация о клиенте</h4>
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
                        <button type="button" class="btn btn-primary" @click="update">Сохранить</button>
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
            update() {
                axios.post('/customer/update', {
                    singleCustomer: this.singleCustomer
                }).then(response => {
                    this.$store.dispatch('getAllCustomers');
                    $('#singleCustomerModal').modal('hide');
                }).catch(function (error) {});
            },

            closeModal() {
                $('#singleCustomerModal').modal('hide');
            }
        }


    }
</script>
