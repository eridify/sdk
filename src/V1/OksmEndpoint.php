<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Oksm\V1OksmListResponse;

final class OksmEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1OksmListResponse>
     */
    public function list(): array
    {
        return V1Codec::oksmListFromPayload(
            $this->transport->requestJson(Paths::EXT_V1_OKSM_LIST),
        );
    }

}
