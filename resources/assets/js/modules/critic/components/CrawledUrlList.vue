<template>
    <div>
        <h2>All crawled urls</h2>

        <span>Amount of urls crawled: {{ crawlCount }}</span>

        <div v-show="hasActiveUrl">
            <table>
                <tr>
                    <td>Status code</td>
                    <td>Url</td>
                    <td>Title</td>
                    <td>H1</td>
                    <td>Content type</td>
                <tr/>

                <tr v-for="crawledUrl in crawledUrls">
                    <td>{{ crawledUrl.statusCode }}</td>
                    <td>{{ crawledUrl.url }}</td>
                    <td>{{ crawledUrl.title }}</td>
                    <td>{{ crawledUrl.h1 }}</td>
                    <td>{{ crawledUrl.contentType }}</td>
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
            'crawledUrls',
            'crawlCount',
            'hasActiveUrl',
        ]),
    },
}
</script>
