<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Spends;

use DateTimeImmutable;

final class V1TenchatSpendsListUnallocatedResponse
{

    public function __construct(
        public readonly int $spendId,
        public readonly int $advertisementId,
        public readonly DateTimeImmutable $dateFrom,
        public readonly DateTimeImmutable $dateTo,
        public readonly int $viewsCount,
        public readonly float $ctr,
        public readonly int $cpm,
        public readonly int $periodCost,
        public readonly bool $isFinished,
        public readonly ?int $clicksCount = null,
    ) {
    }

}
