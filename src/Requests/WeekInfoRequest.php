<?php

namespace AirtimePro\Requests;

class WeekInfoRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return '/week-info';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'timezone' => 'UTC',
        ];
    }
}
