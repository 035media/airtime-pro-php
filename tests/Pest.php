<?php

declare(strict_types=1);

use AirtimePro\AirtimePro;
use AirtimePro\Tests\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;

uses(TestCase::class);

function airtimePro(string $domain = 'sourcefabric.airtime.pro'): AirtimePro
{
    $mockClient = new MockClient([
        '*' => function (PendingRequest $pendingRequest) {
            $reflection = new ReflectionClass($pendingRequest->getRequest());

            return MockResponse::fixture($reflection->getShortName());
        },
    ]);

    $connector = AirtimePro::make($domain);
    $connector->withMockClient($mockClient);

    return $connector;
}
