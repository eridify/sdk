<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Advertisements;

use DateTimeImmutable;

final class V1TenchatAdvertisementsStatisticsResponse
{

    public function __construct(
        public readonly DateTimeImmutable $date,
        public readonly int $viewsCount,
        public readonly int $clicksCount,
        public readonly float $ctr,
        public readonly int $cpm,
        public readonly int $periodCost,
    ) {
    }

}
