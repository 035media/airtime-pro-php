<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

class ShowLogoRequest extends BaseRequest
{
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
