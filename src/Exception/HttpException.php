<?php

declare(strict_types = 1);

namespace Eridify\SDK\Exception;

use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class HttpException extends BaseException
{

    public function __construct(
        public readonly ResponseInterface $response,
        string $message,
        int $code,
        public readonly ?RequestException $guzzleException = null,
    ) {
        parent::__construct($message, $code);
    }

}
