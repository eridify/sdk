<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Acts;

final class V1ActsCreateResponse
{

    public function __construct(
        public readonly int $actId,
        public readonly ?string $actNumber = null,
    ) {
    }

}
