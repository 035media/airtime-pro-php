<?php

declare(strict_types=1);

namespace AirtimePro\DataObjects;

use AirtimePro\DataObjects\LiveInfo\Show;
use AirtimePro\DataObjects\LiveInfo\Station;
use AirtimePro\DataObjects\LiveInfo\Track;
use Saloon\Contracts\Response;

class LiveInfo
{
    public function __construct(
        protected array $station,
        protected array $tracks,
        protected array $shows,
    ) {
        //
    }

    public static function fromResponse(Response $response): static
    {
        $data = $response->json();

        return new static($data['station'], $data['tracks'], $data['shows']);
    }

    public function station(?string $key = null): Station
    {
        $station = Station::fromData($this->station);

        if (is_null($key)) {
            return $station;
        }

        return $station->{$key};
    }

    public function previousTrack(): ?Track
    {
        if (is_null($this->tracks['previous'])) {
            return null;
        }

        return Track::fromData($this->tracks['previous']);
    }

    public function currentTrack(): ?Track
    {
        if (is_null($this->tracks['current'])) {
            return null;
        }

        return Track::fromData($this->tracks['current']);
    }

    public function nextTrack(): ?Track
    {
        if (is_null($this->tracks['next'])) {
            return null;
        }

        return Track::fromData($this->tracks['next']);
    }

    public function previousShows(): array
    {
        $shows = [];

        foreach ($$this->shows['previous'] as $data) {
            $shows[] = Show::fromData($data);
        }

        return $shows;
    }

    public function currentShow(): ?Show
    {
        if (is_null($this->shows['current'])) {
            return null;
        }

        return Show::fromData($this->shows['current']);
    }

    public function nextShows(): array
    {
        $shows = [];

        foreach ($$this->shows['next'] as $data) {
            $shows[] = Show::fromData($data);
        }

        return $shows;
    }
}
