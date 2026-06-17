<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contracts;

use DateTimeImmutable;
use Eridify\SDK\V1\Enum\ContractType;
use Eridify\SDK\V1\Enum\Subject;

final class V1ContractsListResponse
{

    public function __construct(
        public readonly int $contractId,
        public readonly int $customerId,
        public readonly int $executorId,
        public readonly ContractType $contractType,
        public readonly DateTimeImmutable $dateStart,
        public readonly Subject $subject,
        public readonly bool $executorKeepsCreativeRecords,
        public readonly ?string $contractNumber = null,
        public readonly ?DateTimeImmutable $dateEnd = null,
        public readonly ?int $amount = null,
    ) {
    }

}
