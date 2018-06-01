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
        image: '',
        pts: '',
        frame: '',
        mileage: ''
    },

    chosenAuto: {
        id: 0,
        brand: '',
        vin: '',
        reg_number: '',
        year: '',
        volume: 0,
        transmission: '',
        image: '',
        pts: '',
        frame: '',
        mileage: ''
    }
};

const mutations = {
    getAllAutos: (state) => {
        axios.get('/auto/get_all').then(response => {
            state.autos = response.data;
        }).catch(function (error) {});
    },

    getSingleAuto: (state, data) => {
        axios.get('/auto/get_by_id/' + data.auto_id).then(response => {
            state.singleAuto = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllAutos: (context) => {
        context.commit('getAllAutos');
    },

    getSingleAuto: (context, payload) => {
        context.commit('getSingleAuto', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
