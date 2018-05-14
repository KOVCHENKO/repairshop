<!-- Компонент - кабинет пользователя -->
<template>
    <div>
		<notifications></notifications>

		<!-- Меню пользователя -->
        <div id="top-menu">
			<span class="title">Меню администратора</span>
			<div class="sub-title"><i class="fa fa-angle-right"></i></div>
			<span class="sub-title">{{ $store.state.studentSetting.subTitle }}</span>

			<button class="right" title="Выход" @click="logout"><i class="fa fa-sign-out"></i></button>
			<router-link to="/admins/show" tag="button" class="right" title="администраторы"><i class="fa fa-building"></i></router-link>
			<router-link to="/spares/show" tag="button" class="right" title="запчасти"><i class="fa fa-pencil"></i></router-link>
			<router-link to="/masters/show" tag="button" class="right" title="мастера"><i class="fa fa-male"></i></router-link>
			<router-link to="/services/show" tag="button" class="right" title="услуги"><i class="fa fa-share-alt"></i></router-link>
		</div>

    </div>
</template>

<script>

    export default {
        data() {
            return {
                userLogin			: window.userLogin,
                popoverDatai		: "some",
				hidden				: "hidden",
				goal_state			: "",
				user				: {},
				isArchiveOn			: false
            }
		},

		methods: {
			
			/* Выйти */
			logout: function() {
				let self = this;
				axios.get('/logout').then(function (response) {
					self.$router.push('/');
				});
			}
		}
    }
</script>
