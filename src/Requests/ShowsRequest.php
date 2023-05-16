<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

class ShowsRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        if (is_null($this->id)) {
            return '/shows';
        }

        return '/shows?show_id='.$this->id;
    }

    public function __construct(
        public readonly ?int $id,
    ) {
        //
    }
}
