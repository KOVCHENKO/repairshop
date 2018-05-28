<template>
<div>
    <notifications></notifications>

    <div class="welcome">

        <div id="user-form">
            <input type="text" name="логин" placeholder="Логин" v-model="user_login" v-validate="'required|email'"/>
            <input type="password" name="пароль" placeholder="Пароль" v-model="user_password" v-validate="'required'" />

            <button type="button" class="main-button btn-primary" v-on:click="login">
                Войти
            </button>
            <span class="validation-error" v-if="validation.invalid_message_visibility">{{ validation.invalid_message }}</span>
        </div>

    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                user_login: '',
                user_password: '',

                validation: {
                    invalid_message_visibility: false,
                    invalid_message: 'error'
                }
            }
        },

        methods: {
            login() {
                let self = this;

                self.validation.invalid_message = '';
                self.validation.invalid_message_visibility = false;

                axios.post('/login', {
                    login: this.user_login,
                    password: this.user_password
                }).then(function (response) {
                    console.log(response.data);
                    self.chooseUserForLogin(response.data);
                }).catch(function (error) {
                    console.log("wrong login-password")
                    self.$notify({
                        title: 'Сообщение',
                        text: 'Неправильный логин/пароль',
                        type: 'warning'
                    });
                });
            },

            chooseUserForLogin(loginData) {
                let self = this;
                switch(loginData.role) {
                    case 'student':
                        self.$router.push('/rules');
                        break;
                        /* TODO: проверка на то, есть ли у пользователя привязанный класс и школа. Если нет. То компонент с заполнением */
                    case 'admin':
                        self.$router.push('/manager/menu');
                        break;
                    case 'superadmin':
                        self.$router.push('/admins/menu');
                        break;
                }
            }
        }


    }
</script>
