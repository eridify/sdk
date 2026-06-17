<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Oksm;

final class V1OksmListResponse
{

    public function __construct(
        public readonly string $code,
        public readonly string $alpha3,
        public readonly string $name,
    ) {
    }

}
