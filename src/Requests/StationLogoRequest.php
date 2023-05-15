<?php

namespace AirtimePro\Requests;

class StationLogoRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return '/station-logo';
    }
}
