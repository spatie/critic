import axios from 'axios';
import CrawledUrl from './CrawledUrl';

export default {
    state: {
        activeUrl: '',
        crawledUrls: [],
        crawlStatus: 'idle',
    },

    getters: {
        activeUrl: ({ activeUrl }) => activeUrl,
        hasActiveUrl: ({ activeUrl }) => activeUrl != '',
        crawledUrls: ({ crawledUrls }) => crawledUrls,
        crawlCount: ({ crawledUrls }) => crawledUrls.length,
        crawlErrors: ({ crawledUrls }) => crawledUrls.filter(u => u.isError()),
        crawlErrorCount: (_, { crawlErrors }) => crawlErrors.length,
    },

    mutations: {
        startCrawling(state, url) {
            state.crawledUrls = [];
            state.activeUrl = url;
            state.crawlStatus = 'busy';
        },

        addCrawledUrl (state, crawledUrl) {
            state.crawledUrls.unshift(
                new CrawledUrl(crawledUrl)
            );
        },

        crawlHasEnded(state) {
            state.crawlStatus = 'finished';
        },
    },

    actions: {
        startCrawling(context, url) {
            axios
                .post('/api/crawl/start', {url})
                .then(() => context.commit('startCrawling', url));
        },
    },
};