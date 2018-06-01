const state = {
    customers: [],
    singleCustomer: {
        id: 0,
        name: '',
        login: '',
        password: '',
        phone: '',
        role: 'customer'
    },

    chosenCustomer: {
        id: 0,
        name: '',
        login: '',
        phone: '',
        password: ''
    }
};

const mutations = {
    getAllCustomers: (state) => {
        axios.get('/customer/get_all').then(response => {
            state.customers = response.data;
        }).catch(function (error) {});
    },

    getSingleCustomer: (state, data) => {
        axios.get('/customer/get_by_id/' + data.customer_id).then(response => {
            state.singleCustomer = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllCustomers: (context) => {
        context.commit('getAllCustomers');
    },

    getSingleCustomer: (context, payload) => {
        context.commit('getSingleCustomer', payload)
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
