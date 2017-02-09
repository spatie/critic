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
    export default {
        computed: {
            crawlCount () {
                return this.$store.state.crawledUrls.length;
            },

            errorCount () {
                return this.$store.getters.errors.length;
            },

            activeUrl() {
                return this.$store.state.activeUrl
            },

            hasActiveUrl() {
                return this.activeUrl != '';
            },
        },
    }
</script>
