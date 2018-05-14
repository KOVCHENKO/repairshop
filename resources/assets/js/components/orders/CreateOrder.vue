<!-- Создать документ -->
<template>
    <div>
        <!-- Modal - Create cabinet -->
        <div class="modal fade bs-example-modal-lg" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <vue-good-wizard
                                :steps="steps"
                                :onNext="nextClicked"
                                :onBack="backClicked">
                            <div slot="page1">
                                <!-- Выбор машины -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <input type="text" class="search" placeholder="выберите машину"/>
                                    </div>
                                </div>
                            </div>
                            <div slot="page2">
                                <!-- Выбор услуги -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <input type="text" class="search" placeholder="выберите машину"/>
                                    </div>
                                </div>
                            </div>
                            <div slot="page3">
                                <!-- Выбор мастера -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <input type="text" class="search" placeholder="выберите машину"/>
                                    </div>
                                </div>
                            </div>
                            <div slot="page4">
                                <!-- Выбор даты завершения работ -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <input type="text" class="search" placeholder="выберите машину"/>
                                    </div>
                                </div>
                            </div>
                            <div slot="page5">
                                <!-- Сформированный заказ -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <input type="text" class="search" placeholder="выберите машину"/>
                                    </div>
                                </div>
                            </div>
                        </vue-good-wizard>
                    </div>
                </div>
            </div>
        </div>
        <!--end of modal -->

    </div>
</template>

<script>
    export default {

        created() {

        },

        data() {
            return {
                steps: [
                    { label: 'Автомобиль', slot: 'page1' },
                    { label: 'Услуги', slot: 'page2' },
                    { label: 'Мастера', slot: 'page3' },
                    { label: 'Дата завершения', slot: 'page4' },
                    { label: 'Сформированный заказ', slot: 'page5' }
                ],
            }
        },

        computed: {

        },

        methods: {

            nextClicked(currentPage) {
                if(currentPage === 5) {

                }

                return true; //return false if you want to prevent moving to next page
            },

            backClicked(currentPage) {
                return true; //return false if you want to prevent moving to previous page
            },
        }
    }
</script>