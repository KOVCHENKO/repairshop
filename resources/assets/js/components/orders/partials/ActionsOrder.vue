<script>
    export default Vue.component('actions-order', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleOrderModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleOrder', { order_id: this.row.id });
            },

            remove() {
                axios.get('/order/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllOrders');
                }).catch(function (error) {});
            }
        }
    });

</script>