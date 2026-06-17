<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsCreateRequest;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsCreateResponse;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsGetResponse;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsListRequest;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsListResponse;

final class ContractsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1ContractsListResponse>
     */
    public function list(V1ContractsListRequest $request): array
    {
        return V1Codec::contractsListFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRACTS_LIST,
                V1Codec::contractsListRequestToArray($request),
            ),
        );
    }

    public function get(int $contractId): V1ContractsGetResponse
    {
        return V1Codec::contractsGetFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRACTS_GET,
                ['contractId' => $contractId],
            ),
        );
    }

    public function create(V1ContractsCreateRequest $request): V1ContractsCreateResponse
    {
        return V1Codec::contractsCreateFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CONTRACTS_CREATE,
                V1Codec::contractsCreateRequestToArray($request),
            ),
        );
    }

}
