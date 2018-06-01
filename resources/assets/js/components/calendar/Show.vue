<template>
    <div>
        <Calendar startDate="2018-03-07" :dateData="data">
            <div slot="header-left">
                <Button>month</Button>
                <Button>week</Button>
            </div>

            <div
                    :class="['calendar-item', { 'is-otherMonth': !isCurMonth }]"
                    slot-scope="item"
            >
                <div
                        :class="['calendar-item-date']">
                    {{item.date.date}}
                </div>
                <div class="calendar-item-name">{{item.data.title}}</div>
            </div>
        </Calendar>

    </div>
</template>

<script>
    import FullCalendar  from './template/fullCalendar'

    export default {
        created() {
            this.$store.state.managerSetting.subTitle = 'Календарь';
            this.$store.state.managerSetting.buttonAddDisabled = true;
        },

        components: {
            FullCalendar
        },

        computed: {

        },

        data() {
            return {
                isCurMonth: '',
                data: [],
                events: [
                    {
                        title: 'test',
                        allDay: true,
                        start: moment(),
                        end: moment().add(1, 'd'),
                    },
                    {
                        title: 'another test',
                        start: moment().add(2,'d'),
                        end: moment().add(2, 'd').add(2, 'h'),
                    },
                ],
                config: {
                    defaultView: 'month',
                    eventRender: function(event, element) {
                        console.log(event)
                    }
                }
            }
        },

        methods: {

        }

    }
</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>