<?php

namespace App\Services;

use Spatie\Crawler\Url;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class CrawledUrlReport
{
    /** @var \Spatie\Crawler\Url */
    protected $url;

    /** @var null|\Psr\Http\Message\ResponseInterface */
    protected $response;

    /** @var string */
    protected $responseBody = '';

    /** @var null|\Spatie\Crawler\Url */
    protected $foundOnUrl;

    public function __construct(Url $url, ?ResponseInterface $response, ?Url $foundOnUrl = null)
    {
        $this->url = $url;

        $this->response = $response;

        $this->responseBody = $response ? (string) $response->getBody() : '';

        $this->foundOnUrl = $foundOnUrl;
    }

    public function getUrl(): string
    {
        return (string) $this->url;
    }

    public function getFoundOnUrl(): string
    {
        if (! $this->foundOnUrl) {
            return '';
        }

        return (string) $this->foundOnUrl;
    }

    public function getStatusCode(): ?int
    {
        if (! $this->response) {
            return null;
        }

        return $this->response->getStatusCode();
    }

    public function getTitle(): string
    {
        return $this->runDomQuery('head > title');
    }

    public function getH1(): string
    {
        return $this->runDomQuery('H1');
    }

    public function getHeaders(): array
    {
        if (! $this->response) {
            return [];
        }

        return $this->response->getHeaders();
    }

    public function getResponseBodyLength()
    {
        if (is_null($this->response)) {
            return 0;
        }

        return strlen($this->responseBody);
    }

    protected function runDomQuery(string $query)
    {
        try {
            $contents = [];

            (new DomCrawler($this->responseBody))->filter($query)
                ->each(function (DomCrawler $node) use (&$contents) {
                    $contents[] = $node->text();
                });

            return implode($contents);
        } catch (InvalidArgumentException $e) {
            return '';
        }
    }
}
