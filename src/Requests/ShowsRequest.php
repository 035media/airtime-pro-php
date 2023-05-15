<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        if (! is_null($this->id)) {
            return '/shows?show_id='.$this->id;
        }

        return '/shows';
    }

    public function __construct(
        public readonly ?int $id,
    ) {
        //
    }
}
