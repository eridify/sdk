<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Acts\V1ActsCreateRequest;
use Eridify\SDK\V1\DTO\Acts\V1ActsCreateResponse;
use Eridify\SDK\V1\DTO\Acts\V1ActsGetResponse;

final class ActsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    public function get(int $actId): V1ActsGetResponse
    {
        return V1Codec::actsGetFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_ACTS_GET,
                ['actId' => $actId],
            ),
        );
    }

    public function create(V1ActsCreateRequest $request): V1ActsCreateResponse
    {
        return V1Codec::actsCreateFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_ACTS_CREATE,
                V1Codec::actsCreateRequestToArray($request),
            ),
        );
    }

}
