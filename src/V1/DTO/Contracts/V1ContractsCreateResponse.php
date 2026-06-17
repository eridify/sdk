<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contracts;

final class V1ContractsCreateResponse
{

    public function __construct(
        public readonly int $contractId,
    ) {
    }

}
