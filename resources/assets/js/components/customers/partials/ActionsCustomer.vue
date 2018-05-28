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
                axios.get('/customer/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllCustomers');
                }).catch(function (error) {});
            }
        }
    });

</script>