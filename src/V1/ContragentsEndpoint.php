<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsCreateRequest;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsCreateResponse;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsGetResponse;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsListRequest;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsListResponse;

final class ContragentsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1ContragentsListResponse>
     */
    public function list(V1ContragentsListRequest $request): array
    {
        return V1Codec::contragentsListFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRAGENTS_LIST,
                V1Codec::contragentsListRequestToArray($request),
            ),
        );
    }

    public function get(int $contragentId): V1ContragentsGetResponse
    {
        return V1Codec::contragentsGetFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRAGENTS_GET,
                ['contragentId' => $contragentId],
            ),
        );
    }

    public function create(V1ContragentsCreateRequest $request): V1ContragentsCreateResponse
    {
        return V1Codec::contragentsCreateFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRAGENTS_CREATE,
                V1Codec::contragentsCreateRequestToArray($request),
            ),
        );
    }

}
