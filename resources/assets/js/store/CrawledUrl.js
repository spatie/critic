import _ from 'lodash';

export default class CrawledUrl
{
    constructor(crawledUrlProperties) {
        this.url = crawledUrlProperties.url;
        this.statusCode = crawledUrlProperties.statusCode;
        this.title = this.statusCode == 200 ? crawledUrlProperties.title : '';
        this.h1 = this.statusCode == 200 ? crawledUrlProperties.h1 : '';
        this.headers = crawledUrlProperties.headers
    }

    get contentType() {
        if (this.headers['Content-Type'] == undefined) {
            return '';
        }

        return this.headers['Content-Type'][0] || '';
    }

    isError() {
         if(_.startsWith(this.statusCode, '2')) {
             return false;
         }

        if(_.startsWith(this.statusCode, '3')) {
            return false;
        }

        return true;
    }


}