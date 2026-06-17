<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Paths;

final class PingEndpoint
{

    public function __construct(
        private readonly \Eridify\SDK\Http\HttpClient $transport,
    ) {
    }

    /**
     * POST `/ext/v1/ping` — проверка доступности API.
     */
    public function execute(): string
    {
        return $this->transport->requestJson(Paths::EXT_V1_PING);
    }

}
