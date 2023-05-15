<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowScheduleRequest extends Request
{
    protected Method $method = Method::GET;

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
