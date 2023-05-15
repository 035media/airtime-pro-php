<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class StationMetadataRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/station-metadata';
    }
}
