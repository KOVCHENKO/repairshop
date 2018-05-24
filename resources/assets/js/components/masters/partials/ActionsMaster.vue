<script>
    export default Vue.component('actions-master', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleMasterModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleMaster', { master_id: this.row.id });
            },

            remove() {
                axios.get('/master/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllMasters');
                }).catch(function (error) {});
            }
        }
    });

</script>