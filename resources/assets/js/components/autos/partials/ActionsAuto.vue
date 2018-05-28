<script>
    export default Vue.component('actions-auto', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleAutoModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleAuto', { auto_id: this.row.id });
            },

            remove() {
                axios.get('/auto/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllAutos');
                }).catch(function (error) {});
            }
        }
    });

</script>