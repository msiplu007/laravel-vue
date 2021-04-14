require('./bootstrap');

window.Vue = require('vue');

import router from './public/router'

Vue.component('public-master', require('./components/public/PublicMaster.vue').default);

import {store} from './common/store/store'

import library from './common/library'


const app = new Vue({
    el: '#app',
    router,
    store,
    data:{
        test:"Testing For App",
        best:"This  aa s good"
    }
});

