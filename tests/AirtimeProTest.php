<?php

use AirtimePro\AirtimePro;

it('can be instantiated with a valid domain', function () {
    expect(airtimePro())
        ->toBeInstanceOf(AirtimePro::class)
        ->domain->toBe('sourcefabric.airtime.pro')
        ->resolveBaseUrl()->toBe('https://sourcefabric.airtime.pro/api');
});

it('sanitizes the domain', function (string $domain) {
    expect(airtimePro($domain))
        ->domain->toBe('sourcefabric.airtime.pro');
})->with([
    'whitespace' => '  sourcefabric.airtime.pro   ',
    'unsecure scheme' => 'http://sourcefabric.airtime.pro',
    'secure scheme' => 'https://sourcefabric.airtime.pro',
    'trailing slash' => 'sourcefabric.airtime.pro/',
]);
