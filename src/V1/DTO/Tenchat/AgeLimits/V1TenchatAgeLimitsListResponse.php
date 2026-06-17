<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\AgeLimits;

final class V1TenchatAgeLimitsListResponse
{

    public function __construct(
        public readonly string $dictionaryKey,
        public readonly string $value,
    ) {
    }

}
