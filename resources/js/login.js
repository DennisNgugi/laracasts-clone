/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import axios from 'axios'
import Vue from 'vue'

Vue.use(axios)

Vue.component('vue-login', require('./components/Login.vue').default);



const app = new Vue({
    el: '#login',
});
