<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Tenchat\AgeLimits\V1TenchatAgeLimitsListResponse;
use Eridify\SDK\V1\V1Codec;

final class AgeLimitsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1TenchatAgeLimitsListResponse>
     */
    public function list(): array
    {
        return V1Codec::tenchatAgeLimitsListFromPayload(
            $this->transport->requestJson(Paths::EXT_V1_TENCHAT_AGE_LIMITS_LIST),
        );
    }

}
