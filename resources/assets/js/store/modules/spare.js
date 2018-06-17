const state = {
    spares: [],
    singleSpare: {
        id: 0,
        name: '',
        cost: '',
        quantity: 0,
        unit: ''
    },

    sparesQuantity: 1,

    sparesOfService: [],

    sparesForOrder: 0,

    chosenSpares: []
};

const mutations = {
    getAllSpares: (state) => {
        axios.get('/spare/get_all/').then(response => {
            state.spares = response.data;
        }).catch(function (error) {});
    },

    getSingleSpare: (state, data) => {
        axios.get('/spare/get_by_id/' + data.spare_id).then(response => {
            state.singleSpare = response.data;
        }).catch(function (error) {});
    },

    getAllSparesForService: (state, data) => {
        axios.get('/spare/get_spares_of_service/' + data.service_id).then(response => {
            state.sparesOfService = response.data;
        }).catch(function (error) {});
    }

};

const actions = {
    getAllSpares: (context) => {
        context.commit('getAllSpares');
    },

    getSingleSpare: (context, payload) => {
        context.commit('getSingleSpare', payload)
    },

    getAllSparesForService: (context, payload) => {
        context.commit('getAllSparesForService', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
