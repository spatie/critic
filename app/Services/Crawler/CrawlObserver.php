<?php

namespace App\Services\Crawler;

use Spatie\Crawler\Url;
use App\Events\CrawlHasEnded;
use App\Events\UrlHasBeenCrawled;
use App\Services\CrawledUrlReport;

class CrawlObserver implements \Spatie\Crawler\CrawlObserver
{
    /**
     * Called when the crawler will crawl the url.
     *
     * @param \Spatie\Crawler\Url $url
     *
     * @return void
     */
    public function willCrawl(Url $url)
    {
    }

    /**
     * Called when the crawler has crawled the given url.
     *
     * @param \Spatie\Crawler\Url $url
     * @param \Psr\Http\Message\ResponseInterface|null $response
     * @param \Spatie\Crawler\Url $foundOnUrl
     *
     * @return void
     */
    public function hasBeenCrawled(Url $url, $response, Url $foundOnUrl = null)
    {
        $crawledUrlReport = new CrawledUrlReport($url, $response, $foundOnUrl);

        event(new UrlHasBeenCrawled($crawledUrlReport));
    }

    /**
     * Called when the crawl has ended.
     *
     * @return void
     */
    public function finishedCrawling()
    {
        \Log::info('crawl has ended');

        event(new CrawlHasEnded());
    }
}
