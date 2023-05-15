<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class LiveInfoRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/live-info-v2';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'timezone' => 'UTC',
        ];
    }
}
