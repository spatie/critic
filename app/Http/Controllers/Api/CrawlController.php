<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StartCrawlRequest;

class CrawlController
{
    public function start(StartCrawlRequest $request)
    {
        $basePath = base_path();

        exec("php {$basePath}/artisan crawl {$request->url} > /dev/null 2>/dev/null &");
    }
}
