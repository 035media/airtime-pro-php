<?php

declare(strict_types=1);

namespace AirtimePro\Requests;

use AirtimePro\Responses\BaseResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseRequest extends Request
{
    protected Method $method = Method::GET;

    protected ?string $response = BaseResponse::class;
}
