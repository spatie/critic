import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        crawledUrls: [],
        activeUrl: '',
        crawlStatus: 'idle',
    },

    getters: {
        errors: state => {
            return state.crawledUrls.filter(crawledUrl => crawledUrl.isError())
        },
    },

    mutations: {
        startCrawling(state, url) {
            state.crawledUrls = [];
            state.activeUrl = url;
            state.crawlStatus = 'busy';
        },

        addCrawledUrl (state, crawledUrl) {
            state.crawledUrls.unshift(crawledUrl);
        },

        crawlHasEnded(state) {
            state.crawlStatus = 'finished';
        }
    },

    actions: {
        startCrawling(context, url) {
            axios.post('/api/crawl/start', {url})
                .then(() => context.commit('startCrawling', url))
        }
    }
})