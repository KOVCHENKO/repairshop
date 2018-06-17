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
                                <!-- Выбор запасных частей -->
                                <spares-list></spares-list>
                            </div>
                            <div slot="page4">
                                <!-- Выбор мастера -->
                                <masters-list></masters-list>
                            </div>
                            <div slot="page5">
                                <!-- Выбор даты завершения работ -->
                                <div class="row">
                                    <div class="col-sm-12 clearfix">
                                        <datepicker :value="state.date" v-model="singleOrder.completion_date"></datepicker>
                                    </div>
                                </div>
                            </div>
                            <div slot="page6">
                                <!-- Выбор клиента -->
                                <customers-list></customers-list>
                            </div>
                            <div slot="page7">
                                <!-- Сформированный заказ -->
                                <div class="row">
                                    <div class="col-sm-4 clearfix">
                                        <label class="input-title"><strong>Рассчетная стоимость:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <label class="input-title"><h4>{{ this.estimation }} рублей</h4></label>
                                    </div>
                                </div>
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
                                        <label class="input-title"><strong>Отдельные запчасти:</strong></label>
                                    </div>
                                    <div class="col-sm-8 clearfix">
                                        <p v-for="singleChosenSpare in $store.state.spare.chosenSpares">
                                            Наименование: {{ singleChosenSpare.name }},
                                            Ед.изм: {{ singleChosenSpare.unit }},
                                            Кол-во: {{ singleChosenSpare.sparesForOrder }}
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
    import SparesList from './partials/spares/SparesList';
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
            sparesList: SparesList,
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
                    { label: 'Зап. части', slot: 'page3' },
                    { label: 'Мастера', slot: 'page4' },
                    { label: 'Дата завершения', slot: 'page5' },
                    { label: 'Клиент', slot: 'page6' },
                    { label: 'Подтверждение', slot: 'page7' }
                ],

                state: state,
                estimation: 0
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
                if(currentPage === 5) {
                    console.log("estimation");
                    this.estimate();
                }

                if(currentPage === 6) {
                    console.log("creation");
                    this.create();
                }

                return true; //return false if you want to prevent moving to next page
            },

            backClicked(currentPage) {
                return true; //return false if you want to prevent moving to previous page
            },

            estimate() {
                axios.post('/order/estimate', {
                    singleOrder: this.singleOrder,
                    chosenServices: this.$store.state.service.chosenServices,
                    chosenMasters: this.$store.state.master.chosenMasters,
                    chosenSpares: this.$store.state.spare.chosenSpares
                }).then(response => {
                    this.estimation = response.data;
                }).catch(function (error) {});
            },

            create() {
                axios.post('/order/create', {
                    totalCost: this.estimation,
                    singleOrder: this.singleOrder,
                    chosenAuto: this.$store.state.auto.chosenAuto,
                    chosenServices: this.$store.state.service.chosenServices,
                    chosenMasters: this.$store.state.master.chosenMasters,
                    chosenCustomer: this.$store.state.customer.chosenCustomer,
                    chosenSpares: this.$store.state.spare.chosenSpares
                }).then((response) => {
                    this.$notify({
                        title: 'Информация',
                        text: 'Создан новый заказ',
                        type: 'warning'
                    });

                    this.$store.dispatch('getAllOrders');

                    this.cleanFields();

                    $('#createOrderModal').modal('hide');

                    console.log('Order has been create')
                }).catch((error) => {
                    this.$notify({
                        title: 'Ошибка',
                        text: 'Не были заполнены все поля. Необходимо вернуться и заполнить всю информацию',
                        type: 'warning'
                    });

                });
            },

            cleanFields() {
                this.$store.state.service.chosenServices = [];
                this.$store.state.spare.chosenSpares = [];
                this.$store.state.spare.sparesForOrder = 1;

                this.$store.state.master.chosenMasters = [];
                this.$store.state.master.chosenMasters = [];
                this.$store.state.master.laborHours = 1;

                this.$store.state.customer.chosenCustomer.id = 0;
                this.$store.state.customer.chosenCustomer.name = '';
                this.$store.state.customer.chosenCustomer.login = '';
                this.$store.state.customer.chosenCustomer.phone = '';
                this.$store.state.customer.chosenCustomer.password = '';
            }

        }
    }
</script>