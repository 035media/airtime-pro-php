<?php

namespace AirtimePro;

use AirtimePro\Requests\LiveInfoRequest;
use AirtimePro\Requests\WeekInfoRequest;
use AirtimePro\Responses\BaseResponse;
use Saloon\Http\Connector;

class AirtimePro extends Connector
{
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

    public function __construct(
        protected string $domain,
    ) {
        $this->domain = trim($domain);
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
