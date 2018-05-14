const state = {
    autos: [],
    singleAuto: {
        id: 0,
        brand: '',
        vin: '',
        reg_number: '',
        year: '',
        volume: 0,
        transmission: '',
        image: ''
    }
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
