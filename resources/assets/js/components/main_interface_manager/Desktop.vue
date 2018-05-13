<!-- Компонент - кабинет пользователя -->
<template>
    <div>
        <top-menu></top-menu>

        <button id="button-add" class="circular red" data-toggle="modal"
                v-bind:disabled="$store.state.managerSetting.buttonAddDisabled"
                :title="$store.state.managerSetting.buttonAddTitle"
                @click="$store.state.managerSetting.buttonAddAction"
                :data-target="$store.state.managerSetting.buttonAddDataTarget">
            <i class="fa fa-plus"></i>
        </button>

        <div id="main-desktop">
            <div id="main-container">
                <router-view></router-view>
            </div>
        </div>

    </div>
</template>

<script>
    import TopMenu from './TopMenu.vue';

    export default {

        components: {
            TopMenu: TopMenu,
        },

        data() {
            return {
                showRightContent    : false,
            }
        },

        created() {

        },

        methods: {

        }
    }
</script>
