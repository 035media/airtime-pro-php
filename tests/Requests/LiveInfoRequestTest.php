<?php

use AirtimePro\DataObjects\LiveInfo;
use AirtimePro\DataObjects\LiveInfo\Show;
use AirtimePro\DataObjects\LiveInfo\Station;
use AirtimePro\DataObjects\LiveInfo\Track;

it('can fetch live info', function () {
    expect(airtimePro()->liveInfo())
        ->toBeInstanceOf(LiveInfo::class);
});

it('can fetch live info - station data', function () {
    expect(airtimePro()->liveInfo()->station())
        ->toBeInstanceOf(Station::class);
});

it('can fetch live info - track data', function () {
    expect(airtimePro()->liveInfo()->previousTrack())
        ->toBeInstanceOf(Track::class);

    expect(airtimePro()->liveInfo()->currentTrack())
        ->toBeInstanceOf(Track::class);

    expect(airtimePro()->liveInfo()->nextTrack())
        ->toBeInstanceOf(Track::class);
});

it('can fetch live info - show data', function () {
    expect(airtimePro()->liveInfo()->previousShows())
        ->toBeArray();

    expect(airtimePro()->liveInfo()->currentShow())
        ->toBeInstanceOf(Show::class);

    expect(airtimePro()->liveInfo()->nextShows())
        ->toBeArray();
});
