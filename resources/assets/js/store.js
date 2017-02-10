import Vue from 'vue';
import Vuex, { Store } from 'vuex';
import Critic from './modules/critic/store';

Vue.use(Vuex);

export default new Store({
    modules: {
        Critic,
    },
});