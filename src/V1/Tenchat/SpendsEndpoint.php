<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsAllocateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsAllocateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsListUnallocatedRequest;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsListUnallocatedResponse;
use Eridify\SDK\V1\V1Codec;

final class SpendsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1TenchatSpendsListUnallocatedResponse>
     */
    public function listUnallocated(V1TenchatSpendsListUnallocatedRequest $request): array
    {
        return V1Codec::tenchatSpendsListUnallocatedFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_TENCHAT_SPENDS_LIST_UNALLOCATED,
                V1Codec::tenchatSpendsListUnallocatedRequestToArray($request),
            ),
        );
    }

    /**
     * @return list<V1TenchatSpendsAllocateResponse>
     */
    public function allocate(V1TenchatSpendsAllocateRequest $request): array
    {
        return V1Codec::tenchatSpendsAllocateFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_TENCHAT_SPENDS_ALLOCATE,
                V1Codec::tenchatSpendsAllocateRequestToArray($request),
            ),
        );
    }

}
