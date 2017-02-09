<?php

namespace App\Console\Commands;

use Spatie\Crawler\Crawler;
use Illuminate\Console\Command;
use App\Services\Crawler\CrawlObserver;

class CrawlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test crawl';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Crawler::create()
            ->setCrawlObserver(new CrawlObserver())
            ->startCrawling($this->argument('url'));
    }
}
