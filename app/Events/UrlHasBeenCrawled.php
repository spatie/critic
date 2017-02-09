<?php

namespace App\Events;

use App\Services\CrawledUrlReport;
use App\Services\CrawledUrlReportTransformer;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UrlHasBeenCrawled implements ShouldBroadcast
{
    /** @var \App\Services\CrawledUrlReport */
    protected $crawledUrlReport;

    public function __construct(CrawledUrlReport $crawledUrlReport)
    {
        $this->crawledUrlReport = $crawledUrlReport;
    }

    public function broadcastWith(): array
    {
        return fractal($this->crawledUrlReport, new CrawledUrlReportTransformer())->toArray();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['crawler'];
    }
}
