<template>
    <div>
        <datatable-customized
                :columns="table.columns"
                :data="orders"
        ></datatable-customized>
    </div>
</template>

<script>
    export default {
        created() {

        },

        computed: {
            // orders: {
            //     get() { return this.$store.state.order.orders },
            //     set(value) { return this.$store.state.order.orders = value }
            // },
            // singleOrder: {
            //     get() { return this.$store.state.order.singleOrder },
            //     set(value) { return this.$store.state.order.singleOrder = value }
            // }
        },

        data() {
            return {
                table: {
                    columns: [
                        {label: 'id', field: 'id'},
                        {label: 'Наименование', field: 'name'},
                        {label: 'Автомобиль', field: 'auto'},
                        {label: 'Дата завершения', field: 'completion_date'},
                        {label: '', component: 'actions-order'}
                    ]
                },
            }
        },

        methods: {
            createOption() {
                this.singleOrder.id = 0;
                this.singleOrder.name = '';
                this.singleOrder.auto = '';
                this.singleOrder.completion_date = '';
            }

        }


    }
</script>
