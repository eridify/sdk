<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsCreateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsCreateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsStatisticsRequest;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsStatisticsResponse;
use Eridify\SDK\V1\V1Codec;

final class AdvertisementsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    public function create(V1TenchatAdvertisementsCreateRequest $request): V1TenchatAdvertisementsCreateResponse
    {
        return V1Codec::tenchatAdvertisementCreateFromPayload(
            $this->transport->requestMultipart(
                Paths::EXT_V1_TENCHAT_ADVERTISEMENTS_CREATE,
                V1Codec::tenchatAdvertisementCreateRequestToMultipart($request),
            ),
        );
    }

    /**
     * @return list<V1TenchatAdvertisementsStatisticsResponse>
     */
    public function statistics(V1TenchatAdvertisementsStatisticsRequest $request): array
    {
        return V1Codec::tenchatAdvertisementStatisticsFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_TENCHAT_ADVERTISEMENTS_STATISTICS,
                V1Codec::tenchatAdvertisementStatisticsRequestToArray($request),
            ),
        );
    }

}
