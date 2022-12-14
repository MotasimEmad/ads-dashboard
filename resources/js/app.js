require('./bootstrap');

import Vue from 'vue';


Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-header', require('./components/UI/BaseHeader').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);
Vue.component('sale-sidebar', require('./components/UI/SaleSidebar').default);

const app = new Vue({
    el: '#app',
});
