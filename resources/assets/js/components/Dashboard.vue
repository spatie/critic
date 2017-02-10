<template>
    <div>
        <h2>Dashboard</h2>

        <div v-show="hasActiveUrl">
            <span>Amount of urls crawled: {{ crawlCount }}</span><br />
            <span>Amount of errors: {{ errorCount }}</span>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters([
            'crawledUrls',
            'errors',
            'activeUrl',
        ]),

        crawlCount () {
            return this.crawledUrls.length;
        },

        errorCount () {
            return this.errors.length;
        },

        hasActiveUrl() {
            return this.activeUrl != '';
        },
    },
};
</script>
