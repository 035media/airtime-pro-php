<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

use AirtimePro\DataObjects\LiveInfo;
use Saloon\Contracts\Response;

class LiveInfoRequest extends BaseRequest
{
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

    public function createDtoFromResponse(Response $response): LiveInfo
    {
        return LiveInfo::fromResponse($response);
    }
}
