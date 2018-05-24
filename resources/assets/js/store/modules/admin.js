const state = {
    admins: [],
    singleAdmin: {
        id: 0,
        login: '',
        password:'',
        role: 'admin'
    }
};

const mutations = {
    getAllAdmins: (state) => {
        axios.get('/admin/get_all/').then(response => {
            state.admins = response.data;
        }).catch(function (error) {});
    },

    getSingleAdmin: (state, data) => {
        axios.get('/admin/get_by_id/' + data.admin_id).then(response => {
            state.singleAdmin = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllAdmins: (context) => {
        context.commit('getAllAdmins');
    },

    getSingleAdmin: (context, payload) => {
        context.commit('getSingleAdmin', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
