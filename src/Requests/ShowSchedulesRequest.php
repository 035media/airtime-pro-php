<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

class ShowSchedulesRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return '/show-schedules?show_id='.$this->id;
    }

    public function __construct(
        public readonly int $id,
    ) {
        //
    }
}
