<?php

namespace AirtimePro;

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
}
