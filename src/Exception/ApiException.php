<?php

declare(strict_types = 1);

namespace Eridify\SDK\Exception;

use Eridify\SDK\Enum\ErrorCode;
use Psr\Http\Message\ResponseInterface;

class ApiException extends HttpException
{

    public function __construct(
        ResponseInterface $response,
        string $message,
        public readonly ErrorCode $errorCode = ErrorCode::UNDEFINED,
        public readonly array $data = [],
    ) {
        parent::__construct($response, $message, $errorCode->value);
    }

}
