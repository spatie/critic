import axios from 'axios';

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

import Vue from 'vue';
import Echo from 'laravel-echo';
import router from './router';
import store from './store';

import AppHeader from './components/AppHeader.vue';

new Vue({
    router,
    store,

    el: '#app',

    components: {
        AppHeader,
    },

    data() {
        return {
            echo: new Echo({
                broadcaster: 'pusher',
                key: window.Laravel.pusherKey,
            }),
        };
    },

    created() {
        this.echo.channel('crawler').listen('UrlHasBeenCrawled', (event) => {
            this.$store.commit('addCrawledUrl', event.data);
        });

        this.echo.channel('crawler').listen('CrawlHasEnded', (event) => {
            this.$store.commit('crawlHasEnded');
        });
    },
});
