<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

class ShowTracksRequest extends BaseRequest
{
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
