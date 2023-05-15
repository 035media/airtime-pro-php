<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowTracksRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/show-tracks?instance_id='.$this->instanceId;
    }

    public function __construct(
        public readonly int $instanceId,
    ) {
        //
    }
}
