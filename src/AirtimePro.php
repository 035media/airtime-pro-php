<?php

declare(strict_types=1);

namespace AirtimePro;

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
        $this->domain = filter_var($domain, FILTER_SANITIZE_URL);
    }

    public function liveInfo(): BaseResponse
    {
        return $this->send(new LiveInfoRequest);
    }

    public function weekInfo(): BaseResponse
    {
        return $this->send(new WeekInfoRequest);
    }
}
