<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

class StationMetadataRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return '/station-metadata';
    }
}
