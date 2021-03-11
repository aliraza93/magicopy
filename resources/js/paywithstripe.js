require('./vue-asset');
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import Vue from 'vue'
window.Vue = require('vue');

Vue.use(VueIziToast);
Vue.component('pay-with-stripe', require('./components/PayWithStripe.vue').default);
Vue.component(
    "stripe-card-element",
    require("./components/StripeCardElement.vue").default
);

var app = new Vue({

    el: '#app'
});