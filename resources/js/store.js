import Vue from 'vue';
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        loggedIn: false,
        username: ''
    },
    mutations: {
        login(state)
        {
            state.loggedIn = true;
        },
        logout(state)
        {
            state.loggedIn = false;
            state.username = '';
        },
        setUsername(state, username)
        {
            state.username = username;
        }
    }
});
