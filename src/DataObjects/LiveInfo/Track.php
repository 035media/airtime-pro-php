<?php

namespace AirtimePro\DataObjects\LiveInfo;

use Carbon\Carbon;

/**
 * @property-read \Carbon\Carbon $starts
 * @property-read \Carbon\Carbon $ends
 * @property-read string $type
 * @property-read string $name
 * @property-read array $metadata
 * @property-read ?bool $mediaItemPlayed
 * @property-read ?int $record
 * @property-read ?string $albumArtworkImage
 */
class Track
{
    public function __construct(
        protected readonly string $starts,
        protected readonly string $ends,
        protected readonly string $type,
        protected readonly string $name,
        protected readonly array $metadata,
        protected readonly ?bool $media_item_played = null,
        protected readonly ?int $record = null,
        protected readonly ?string $album_artwork_image = null,
    ) {
        //
    }

    public static function fromData(array $data): static
    {
        return new static(...$data);
    }

    public function __get(string $name): mixed
    {
        return match ($name) {
            'starts', 'ends' => Carbon::parse($this->{$name}, 'UTC'),
            'mediaItemPlayed' => $this->media_item_played,
            'albumArtworkImage' => $this->album_artwork_image,
            'type', 'name', 'metadata', 'record' => $this->{$name},
        };
    }
}
