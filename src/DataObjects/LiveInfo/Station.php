<?php

declare(strict_types=1);

namespace AirtimePro\DataObjects\LiveInfo;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;

/**
 * @property-read string $env
 * @property-read \Carbon\Carbon $schedulerTime
 * @property-read string $sourceEnabled
 * @property-read \Carbon\CarbonTimeZone $timezone
 * @property-read string $airtimeProVersion
 */
class Station
{
    public function __construct(
        protected readonly string $env,
        protected readonly string $schedulerTime,
        protected readonly string $source_enabled,
        protected readonly string $timezone,
        protected readonly string $AIRTIME_API_VERSION,
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
            'env' => $this->env,
            'schedulerTime' => Carbon::parse($this->schedulerTime, $this->timezone),
            'sourceEnabled' => $this->source_enabled,
            'timezone' => CarbonTimeZone::create($this->timezone),
            'airtimeApiVersion' => $this->AIRTIME_API_VERSION,
        };
    }
}
