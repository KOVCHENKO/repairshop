const state = {
    masters: [],
    singleMaster: {
        id: 0,
        name: '',
        position: '',
        rate: 0,
    },

    chosenMasters: [],
    laborHours: 1
};

const mutations = {
    getAllMasters: (state) => {
        axios.get('/master/get_all/').then(response => {
            state.masters = response.data;
        }).catch(function (error) {});
    },

    getSingleMaster: (state, data) => {
        axios.get('/master/get_by_id/' + data.master_id).then(response => {
            state.singleMaster = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllMasters: (context) => {
        context.commit('getAllMasters');
    },

    getSingleMaster: (context, payload) => {
        context.commit('getSingleMaster', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
