const state = {
    services: [],
    singleService: {
        id: 0,
        name: '',
        description: '',
    },

    chosenServices: []


};

const mutations = {
    getAllServices: (state) => {
        axios.get('/service/get_all').then(response => {
            state.services = response.data;
        }).catch(function (error) {});
    },

    getSingleService: (state, data) => {
        axios.get('/service/get_by_id/' + data.service_id).then(response => {
            state.singleService = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllServices: (context) => {
        context.commit('getAllServices');
    },

    getSingleService: (context, payload) => {
        context.commit('getSingleService', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
