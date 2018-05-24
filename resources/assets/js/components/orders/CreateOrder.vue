<!-- Создать документ -->
<template>
    <div>
        <!-- Modal - Create cabinet -->
        <div class="modal fade bs-example-modal-lg" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <order-wizard
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
                                <div class="row">
                                    <div class="col-sm-4 clearfix">
                                        <label class="input-title"><strong>Автомобиль:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <label class="input-title">{{ this.$store.state.auto.chosenAuto.reg_number }}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 clearfix">
                                        <label class="input-title"><strong>Используемые услуги:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <p v-for="singleChosenService in $store.state.service.chosenServices">
                                            {{ singleChosenService.name }},
                                            {{ singleChosenService.description }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 clearfix">
                                        <label class="input-title"><strong>Мастера:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <p v-for="singleChosenMaster in $store.state.master.chosenMasters">
                                            Имя: {{ singleChosenMaster.name }},
                                            Должность: {{ singleChosenMaster.position }},
                                            Задействованные часы: {{ singleChosenMaster.laborHours }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 clearfix">
                                        <label class="input-title"><strong>Выполнить до:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <label class="input-title">{{ state.date }}</label>
                                    </div>
                                </div>
                            </div>
                        </order-wizard>
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
    import Wizard from '../main_interface_manager/Wizard';


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
            orderWizard: Wizard
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