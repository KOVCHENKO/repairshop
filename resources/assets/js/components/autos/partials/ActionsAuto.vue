<script>
    export default Vue.component('actions-admin', {
        template: `<div class="actions">
                    <button class="btn btn-primary" data-toggle="modal" @click="show" data-target="#singleAdminModal">Показать</button>
                    <button class="btn btn-warning" @click="remove">Удалить</button>
                   </div>`,
        props: ['row'],
        methods: {
            show() {
                this.$store.dispatch('getSingleAdmin', { admin_id: this.row.id });
            },

            remove() {
                axios.get('/admin/delete/' + this.row.id).then(response => {
                    this.$store.dispatch('getAllAdmins');
                }).catch(function (error) {});
            }
        }
    });

</script>