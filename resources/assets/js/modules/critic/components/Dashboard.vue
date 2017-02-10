<template>
    <div>
        <h2>Dashboard</h2>

        <div v-show="hasActiveUrl">
            <span>Amount of urls crawled: {{ crawlCount }}</span><br />
            <span>Amount of errors: {{ crawlErrorCount }}</span>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters([
            'crawlCount',
            'crawlErrorCount',
            'hasActiveUrl',
        ]),
    },
};
</script>
