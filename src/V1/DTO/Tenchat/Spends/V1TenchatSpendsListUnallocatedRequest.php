<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Spends;

use DateTimeImmutable;

final class V1TenchatSpendsListUnallocatedRequest
{

    public function __construct(
        public readonly ?int $advertisementId = null,
        public readonly ?DateTimeImmutable $dateFrom = null,
        public readonly ?DateTimeImmutable $dateTo = null,
    ) {
    }

}
