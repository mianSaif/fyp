import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        isLoggedIn : false,
        chatActive : false,
        chatMate : 0,
    },
    mutations: {
        updateData(state,payload) {
            state.isLoggedIn = payload.status;
        },
        updateChatStatus(state,payload) {
            state.chatActive = payload.active;
            state.chatMate = payload.id;
        }
    },
    actions : {},
    getters : {}
});
export  default store;
