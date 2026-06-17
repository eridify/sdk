<?php

declare(strict_types = 1);

namespace Eridify\SDK;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\V1\V1Client;
use GuzzleHttp\ClientInterface;

final class Api
{

    public readonly V1Client $v1;

    public function __construct(
        string $apiKey,
        ?ClientInterface $customClient = null,
    ) {
        $transport = new HttpClient($apiKey, $customClient);
        $this->v1 = new V1Client($transport);
    }
}
