<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contracts;

final class V1ContractsListRequest
{

    public function __construct(
        public readonly ?int $customerId = null,
        public readonly ?int $executorId = null,
        public readonly ?string $contractNumber = null,
    ) {
    }

}
