<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Acts;

use DateTimeImmutable;
use Eridify\SDK\V1\Enum\CustomerRole;
use Eridify\SDK\V1\Enum\ExecutorRole;

final class V1ActsGetResponse
{

    public function __construct(
        public readonly int $actId,
        public readonly int $contractId,
        public readonly DateTimeImmutable $periodStart,
        public readonly DateTimeImmutable $periodEnd,
        public readonly DateTimeImmutable $issueDate,
        public readonly int $amountWithVat,
        public readonly int $amountWithoutVat,
        public readonly int $vatRate,
        public readonly CustomerRole $customerRole,
        public readonly ExecutorRole $executorRole,
        public readonly ?string $actNumber = null,
        public readonly ?int $vatAmount = null,
    ) {
    }

}
