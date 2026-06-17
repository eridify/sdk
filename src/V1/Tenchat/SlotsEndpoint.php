<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Tenchat\Slots\V1TenchatSlotsListResponse;
use Eridify\SDK\V1\V1Codec;

final class SlotsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1TenchatSlotsListResponse>
     */
    public function list(): array
    {
        return V1Codec::tenchatSlotsListFromPayload(
            $this->transport->requestJson(Paths::EXT_V1_TENCHAT_SLOTS_LIST),
        );
    }

}
