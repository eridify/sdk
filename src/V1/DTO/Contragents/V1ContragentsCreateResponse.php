<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contragents;

final class V1ContragentsCreateResponse
{

    public function __construct(
        public readonly int $contragentId,
    ) {
    }

}
