<template>
    <div class="datatable">
        <label class="sr-only">Поиск</label>
        <input type="text" class="form-control datatable-search" v-model="tableOptions.filter" placeholder="Поиск">

        <datatable :filter-by="tableOptions.filter"
            :columns="columns"
            :data="data"
        ></datatable>

        <datatable-pager v-model="tableOptions.page" :per-page="tableOptions.perPage" type="abbreviated"></datatable-pager>
    </div>
</template>

<script>
    export default {
        props: {
            columns: [Object, Array],
            data: [Object, Array]
        },

        data() {
            return {
                tableOptions: {
                    page: 1,
                    filter: '',
                    perPage: 10
                }
            }
        }

    }
</script>