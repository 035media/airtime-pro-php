<?php

namespace AirtimePro\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ShowLogoRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/show-logo?id='.$this->id;
    }

    public function __construct(
        public readonly int $id,
    ) {
        //
    }
}
