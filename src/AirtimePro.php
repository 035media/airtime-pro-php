<?php

declare(strict_types=1);

namespace AirtimePro;

use AirtimePro\DataObjects\LiveInfo;
use AirtimePro\Requests\LiveInfoRequest;
use AirtimePro\Requests\WeekInfoRequest;
use AirtimePro\Responses\BaseResponse;
use Saloon\Http\Connector;

class AirtimePro extends Connector
{
    public readonly string $domain;

    public function resolveBaseUrl(): string
    {
        return "https://{$this->domain}/api";
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultheaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function __construct(string $domain)
    {
        $this->sanitizeDomain($domain);
    }

    public function liveInfo(): LiveInfo
    {
        return $this->send(new LiveInfoRequest)->dtoOrFail();
    }

    public function weekInfo(): BaseResponse
    {
        return $this->send(new WeekInfoRequest);
    }

    private function sanitizeDomain(string $domain): void
    {
        $domain = filter_var($domain, FILTER_SANITIZE_URL);
        $domain = preg_replace(['@^https?\:\/\/@', '@\/$@'], '', $domain);

        $this->domain = $domain;
    }
}
