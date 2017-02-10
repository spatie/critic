import CrawledUrl from './CrawledUrl';

export default {
    state: {
        activeUrl: '',
        crawledUrls: [],
        crawlStatus: 'idle',
    },

    getters: {
        activeUrl: ({ activeUrl }) => activeUrl,
        crawledUrls: ({ crawledUrls }) => crawledUrls,
        errors: ({ crawledUrls }) => crawledUrls.filter(u => u.isError()),
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