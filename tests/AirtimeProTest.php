<?php

use AirtimePro\AirtimePro;
use AirtimePro\Exceptions\InvalidDomainException;

it('can be instantiated with a valid domain', function () {
    $airtimePro = AirtimePro::make('sourcefabric.airtime.pro');

    expect($airtimePro)
        ->toBeInstanceOf(AirtimePro::class);
});

it('trims domains when instantiated', function () {
    $airtimePro = AirtimePro::make('  sourcefabric.airtime.pro    ');

    expect($airtimePro->domain)
        ->toBe('sourcefabric.airtime.pro');
});

it('throws an exception when given invalid domain', function () {
    $airtimePro = AirtimePro::make('https://invalid.domain');
})->throws(InvalidDomainException::class);
