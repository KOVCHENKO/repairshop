const state = {
    orders: [],
    singleOrder: {
        id: 0,
        name: '',
        auto: {},
        completion_date: 0,
        customer: {},
        masters: [],
        services: []
    }
};

const mutations = {
    getAllOrders: (state) => {
        axios.get('/order/get_all/').then(response => {
            state.orders = response.data;
        }).catch(function (error) {});
    },

    getSingleOrder: (state, data) => {
        axios.get('/order/get_by_id/' + data.order_id).then(response => {
            state.singleOrder = response.data;
        }).catch(function (error) {});
    },

    getAllOrdersOfCustomer: (state) => {
        axios.get('/order/get_all_customer/').then(response => {
            state.orders = response.data;
        }).catch(function (error) {});
    }
};

const actions = {
    getAllOrders: (context) => {
        context.commit('getAllOrders');
    },

    getSingleOrder: (context, payload) => {
        context.commit('getSingleOrder', payload)
    },

    getAllOrdersOfCustomer: (context) => {
        context.commit('getAllOrdersOfCustomer');
    }
};

export default {
    state: state,
    mutations: mutations,
    actions: actions
}
