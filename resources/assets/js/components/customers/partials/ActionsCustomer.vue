<script>
    export default Vue.component('actions-customer', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleCustomerModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleCustomer', { customer_id: this.row.id });
            },

            remove() {
                let self = this;
                axios.get('/customer/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllCustomers');
                }).catch(function (error) {
                    self.$notify({
                        title: 'Предупреждение',
                        text: 'Клиент не может быть удален, так как он уже включена в заказ или используется в системе другими пользователями',
                        type: 'warning'
                    });
                });
            }
        }
    });

</script>