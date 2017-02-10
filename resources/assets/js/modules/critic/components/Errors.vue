<template>
    <div>
        <h2>Non 2xx responses</h2>
        <span>Amount of errors: {{ crawlErrorCount }}</span>

        <div v-show="hasActiveUrl">
            <table>
                <tr>
                    <td>Status code</td>
                    <td>Url</td>
                <tr/>
                <tr v-for="crawledUrl in crawlErrors">
                    <td>{{ crawledUrl.statusCode }}</td>
                    <td>{{ crawledUrl.url }}</td>
                <tr>
            </table>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters([
            'crawlErrors',
            'crawlErrorCount',
            'hasActiveUrl',
        ]),
    },
}
</script>
