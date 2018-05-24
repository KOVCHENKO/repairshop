<script>
    export default Vue.component('actions-spare', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleSpareModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleSpare', { spare_id: this.row.id });
            },

            remove() {
                axios.get('/spare/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllSpares');
                }).catch(function (error) {});
            }
        }
    });

</script>