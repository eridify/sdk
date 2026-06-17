<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Creative\CreativeCreateRequestDto;
use Eridify\SDK\V1\DTO\Creative\CreativeListRequestDto;
use Eridify\SDK\V1\DTO\Creative\CreativeListResponseDto;
use Eridify\SDK\V1\DTO\Creative\CreativeResourceDto;

final class CreativesEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    public function listCreatives(CreativeListRequestDto $request): CreativeListResponseDto
    {
        return V1Codec::creativeListResponseFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_CREATIVES_LIST,
                V1Codec::creativeListRequestToArray($request),
            ),
        );
    }

    public function createCreative(CreativeCreateRequestDto $request): CreativeResourceDto
    {
        return V1Codec::creativeResourceFromPayload(
            $this->transport->requestMultipart(
                Paths::EXT_V1_CREATIVES_CREATE,
                V1Codec::creativeCreateRequestToMultipart($request),
            ),
        );
    }

}
