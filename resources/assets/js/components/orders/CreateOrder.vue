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
                                <autos-list></autos-list>
                            </div>
                            <div slot="page2">
                                <!-- Выбор услуги -->
                                <services-list></services-list>
                            </div>
                            <div slot="page3">
                                <!-- Выбор мастера -->
                                <masters-list></masters-list>
                            </div>
                            <div slot="page4">
                                <!-- Выбор даты завершения работ -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <datepicker :value="state.date" v-model="singleOrder.completion_date"></datepicker>
                                    </div>
                                </div>
                            </div>
                            <div slot="page5">
                                <!-- Выбор клиента -->
                                <customers-list></customers-list>
                            </div>
                            <div slot="page6">
                                <!-- Сформированный заказ -->
                                <p>Сформированный и созданный заказ</p>
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
    import CustomersList from './partials/customers/CustomersList';
    import AutosList from './partials/autos/AutosList';
    import ServicesList from './partials/services/ServicesList';
    import MastersList from './partials/masters/MastersList';
    import DatePicker from 'vuejs-datepicker';

    let state = {
        date: new Date(2016, 9,  16)
    };

    export default {
        components: {
            customersList: CustomersList,
            autosList: AutosList,
            servicesList: ServicesList,
            mastersList: MastersList,
            'datepicker': DatePicker,
        },

        created() {

        },

        data() {
            return {
                steps: [
                    { label: 'Автомобиль', slot: 'page1' },
                    { label: 'Услуги', slot: 'page2' },
                    { label: 'Мастера', slot: 'page3' },
                    { label: 'Дата завершения', slot: 'page4' },
                    { label: 'Выберите клиента', slot: 'page5' },
                    { label: 'Сформированный заказ', slot: 'page6' }
                ],

                state: state,
            }
        },

        computed: {
            singleOrder: {
                get() { return this.$store.state.order.singleOrder },
                set(value) {  return this.$store.state.order.singleOrder = value }
            }
        },

        methods: {

            nextClicked(currentPage) {
                if(currentPage === 6) {

                }

                return true; //return false if you want to prevent moving to next page
            },

            backClicked(currentPage) {
                return true; //return false if you want to prevent moving to previous page
            },
        }
    }
</script>