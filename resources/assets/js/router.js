import Vue from 'vue';
import Router from 'vue-router';

import CrawledList from './components/CrawledList.vue';
import Dashboard from './components/Dashboard.vue';
import Errors from './components/Errors.vue';

Vue.use(Router);

const routes = [
    { path: '/', component: Dashboard },
    { path: '/errors', component: Errors },
    { path: '/all', component: CrawledList },
];

export default new Router({
    mode: 'history',
    routes,
});