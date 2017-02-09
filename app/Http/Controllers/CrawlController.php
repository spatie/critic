<?php

namespace App\Http\Controllers;

class CrawlController extends Controller
{
    public function index()
    {
        $pusherKey = config('broadcasting.connections.pusher.key');

        return view('crawl.index')->with(compact('pusherKey'));
    }
}
