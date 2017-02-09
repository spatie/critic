<template>
    <div>
        <div v-show="crawlerIsNotBusy">
            <input v-model="url" placeholder="https://example.com">
            <button @click="startCrawling">Start crawling</button>
        </div>

        <div>CrawlStatus: {{ crawlStatus }}</div>

        <ul>
            <li><router-link to="/">Dashboard</router-link></li>
            <li><router-link to="/errors">Non 2xx responses</router-link></li>
            <li><router-link to="/all">All crawled links</router-link></li>
        </ul>

        <h1 v-show="hasActiveUrl">Seo report for {{ activeUrl }}</h1>
    </div>
</template>

<script>
export default {
    computed: {
        crawlerIsNotBusy()  {
        return true;

           return this.$store.state.crawlStatus != 'busy';
        },

        crawlStatus() {
           return this.$store.state.crawlStatus
        },

        hasActiveUrl() {
           return this.activeUrl != '';
        },

        activeUrl() {
           return this.$store.state.activeUrl;
        },
    },

    methods: {
        startCrawling() {
            this.$store.dispatch('startCrawling', this.url)
        },
    }
}

</script>
