<?php

namespace App\Services;

use League\Fractal\TransformerAbstract;

class CrawledUrlReportTransformer extends TransformerAbstract
{
    public function transform(CrawledUrlReport $crawledUrlReport): array
    {
        return [
            'url' => $crawledUrlReport->getUrl(),
            'statusCode' => $crawledUrlReport->getStatusCode(),
            'title' => $crawledUrlReport->getTitle(),
            'headers' => $crawledUrlReport->getHeaders(),
            'h1' => $crawledUrlReport->getH1(),
            'foundOnUrl' => $crawledUrlReport->getFoundOnUrl(),
        ];
    }
}
