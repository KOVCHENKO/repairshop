<script>
    export default Vue.component('actions-service', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleServiceModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleService', { service_id: this.row.id });
            },

            remove() {
                axios.get('/service/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllServices');
                }).catch(function (error) {});
            }
        }
    });

</script>