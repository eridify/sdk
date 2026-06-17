<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\KktuCodes\V1KktuCodesListResponse;

final class KktuCodesEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    /**
     * @return list<V1KktuCodesListResponse>
     */
    public function list(): array
    {
        return V1Codec::kktuCodesListFromPayload(
            $this->transport->requestJson(Paths::EXT_V1_KKTU_CODES_LIST),
        );
    }

}
