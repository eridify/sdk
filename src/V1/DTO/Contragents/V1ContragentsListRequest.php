<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Contragents;

use Eridify\SDK\V1\Enum\ContragentType;

final class V1ContragentsListRequest
{

    public function __construct(
        public readonly ContragentType $type,
        public readonly ?string $inn = null,
        public readonly ?string $search = null,
        public readonly ?string $kpp = null,
        public readonly ?string $phone = null,
        public readonly ?string $country = null,
    ) {
    }

}
