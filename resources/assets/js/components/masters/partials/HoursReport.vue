<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="hoursReportModal" tabindex="-1" role="dialog" aria-labelledby="hoursReportModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="hoursReportModalLabel">Часы работы по времени</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 clearfix">
                                <label class="input-title"><strong>От:</strong></label>
                            </div>
                            <div class="col-sm-8 clearfix">
                                <datepicker :value="date.from" v-model="date.from"></datepicker>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 clearfix">
                                <label class="input-title"><strong>До:</strong></label>
                            </div>
                            <div class="col-sm-8 clearfix">
                                <datepicker :value="date.from" v-model="date.to"></datepicker>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 clearfix">
                                <label class="input-title"><strong>Кол-во часов:</strong></label>
                            </div>
                            <div class="col-sm-8 clearfix">
                                <label class="input-title">{{ estimatedHours }}</label>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="estimateHours">Рассчитать</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" @click="estimatedHours = 0">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import DatePicker from 'vuejs-datepicker';

    let date = {
        from: new Date(2018, 9,  16),
        to: new Date(2018, 10,  16)
    };

    export default {
        components: {
            'datepicker': DatePicker,
        },

        data() {
            return {
                date: {
                    from: new Date(2018, 4, 1),
                    to: new Date(2018, 10, 16)
                },

                estimatedHours: 0
            }
        },

        methods: {
            estimateHours() {
                axios.post('/master/estimate_hours', {
                    master: this.$store.state.master.singleMaster,
                    from: this.date.from,
                    to: this.date.to
                }).then((response) => {
                    this.estimatedHours = response.data + ' час(а/ов)';
                }).catch((error) => {});
            },

            hoursReport() {

            }
        }


    }
</script>
