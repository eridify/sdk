<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contragents;

use Eridify\SDK\V1\Enum\ContragentRole;
use Eridify\SDK\V1\Enum\ContragentType;

final class V1ContragentsListResponse
{

    /**
     * @param list<ContragentRole> $roles
     */
    public function __construct(
        public readonly int $contragentId,
        public readonly ContragentType $type,
        public readonly array $roles,
        public readonly ?string $name = null,
        public readonly ?string $fullName = null,
        public readonly ?string $inn = null,
        public readonly ?string $kpp = null,
        public readonly ?string $phone = null,
        public readonly ?string $urlAdvertisingNetwork = null,
        public readonly ?string $country = null,
        public readonly ?string $walletNumber = null,
        public readonly ?string $foreignInn = null,
        public readonly ?string $registrationNumber = null,
    ) {
    }

}
