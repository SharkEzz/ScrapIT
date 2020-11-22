require('./bootstrap');

import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

import router from './router';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.min.css';

import App from './Vue/App';


const vm = new Vue({
    components: { App },
    template: '<App />',
    router
}).$mount('#app');
