<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\KktuCodes;

final class V1KktuCodesListResponse
{

    public function __construct(
        public readonly string $code,
        public readonly string $name,
    ) {
    }

}
