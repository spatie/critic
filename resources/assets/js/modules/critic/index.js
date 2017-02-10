import Dashboard from './components/Dashboard.vue';
import CrawledUrlList from './components/CrawledUrlList.vue';
import Errors from './components/Errors.vue';
import store from './store';

const routes = [
    { path: '/', component: Dashboard },
    { path: '/all', component: CrawledUrlList },
    { path: '/errors', component: Errors },
];

export default {
    routes,
    store,
};