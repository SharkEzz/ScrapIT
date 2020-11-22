require('./bootstrap');

import Vue from 'vue';
import VueRouter from "vue-router";
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(Vuex);

import router from './router';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.min.css';

import App from './Vue/App';

import { store } from "./store";

new Vue({
    components: { App },
    template: '<App />',
    router,
    store
}).$mount('#app');
