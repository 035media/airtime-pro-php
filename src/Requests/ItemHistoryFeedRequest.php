<?php

namespace AirtimePro\Requests;

class ItemHistoryFeedRequest extends Baserequest
{
    public function resolveEndpoint(): string
    {
        return '/item-history-feed';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'timezone' => 'UTC',
            'instance_id' => $this->instanceId,
        ];
    }

    public function __construct(
        protected readonly ?int $instanceId = null,
    ) {
        //
    }
}
