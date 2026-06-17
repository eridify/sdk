<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contracts;

use DateTimeImmutable;
use Eridify\SDK\V1\Enum\ContractAction;
use Eridify\SDK\V1\Enum\ContractType;
use Eridify\SDK\V1\Enum\Subject;

final class V1ContractsCreateRequest
{

    public function __construct(
        public readonly int $customerId,
        public readonly int $executorId,
        public readonly ContractType $contractType,
        public readonly DateTimeImmutable $dateStart,
        public readonly Subject $subject,
        public readonly bool $executorKeepsCreativeRecords,
        public readonly ?string $contractNumber = null,
        public readonly ?DateTimeImmutable $dateEnd = null,
        public readonly ?int $amount = null,
        public readonly ?string $comment = null,
        public readonly ?int $parentContractId = null,
        public readonly ?ContractAction $actions = null,
        public readonly ?bool $agentActs = null,
        public readonly ?bool $feePaidByIntermediary = null,
    ) {
    }

}
