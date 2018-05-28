<template>
    <div>
        <!-- Список кабинетов -->
        <h2 class="first">Меню</h2>
        <!--<span>-->
            <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/admins/show')">
                        <img :src="'public/images/cabinets/5.png'"/>
                        <label class="cabinet-title">Менеджеры</label>
                </button>
            </span>
            <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/services/show')">
                        <img :src="'public/images/cabinets/3.png'"/>
                        <label class="cabinet-title">Услуги</label>
                </button>
            </span>
            <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/spares/show')">
                        <img :src="'public/images/cabinets/6.png'"/>
                        <label class="cabinet-title">Материалы</label>
                </button>
            </span>
            <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/masters/show')">
                        <img :src="'public/images/cabinets/1.png'"/>
                        <label class="cabinet-title">Мастера</label>
                </button>
            </span>
            <span>
                    <button class="cabinet-item"
                            @click="selectMenuItem('/all_orders/show')">
                            <img :src="'public/images/cabinets/2.png'"/>
                            <label class="cabinet-title">Все заказы</label>
                    </button>
            </span>

        <!--</span>-->

    </div>
</template>

<script>

    export default {

        data() {
            return {
            }
        },

        methods: {
            selectMenuItem(route) {
                this.$router.push(route);
            }
        },

    }

</script>