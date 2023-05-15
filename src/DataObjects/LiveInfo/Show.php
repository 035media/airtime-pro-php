<?php

namespace AirtimePro\DataObjects\LiveInfo;

use Carbon\Carbon;

class Show
{
    public function __construct(
        protected readonly string $name,
        protected readonly string $description,
        protected readonly string $genre,
        protected readonly int $id,
        protected readonly int $instance_id,
        protected readonly int $record,
        protected readonly string $url,
        protected readonly string $image_path,
        protected readonly ?int $image_cloud_file_id,
        protected readonly bool $auto_dj,
        protected readonly string $starts,
        protected readonly string $ends,
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
            'starts' => Carbon::parse($this->starts, 'UTC'),
            'ends' => Carbon::parse($this->ends, 'UTC'),
            default => (is_null($this->{$name}) || $this->{$name} === '') ? null : $this->{$name},
        };
    }
}
