<template>
    <div>
        <!-- Список заказов -->
        <h2 class="first">Заказы</h2>
            <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/orders/show')">
                        <img :src="'public/images/cabinets/2.png'"/>
                        <label class="cabinet-title">Заказы</label>
                </button>
            </span>

        <!-- Список других кабинетов -->
        <h2 class="first">Дополнительно</h2>
        <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/orders/show')">
                        <img :src="'public/images/cabinets/5.png'"/>
                        <label class="cabinet-title">Клиенты</label>
                </button>
            </span>
        <span>
                <button class="cabinet-item"
                        @click="selectMenuItem('/autos/show')">
                        <img :src="'public/images/cabinets/3.png'"/>
                        <label class="cabinet-title">Авто</label>
                </button>
        </span>

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