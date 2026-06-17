<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Advertisements;

use DateTimeImmutable;

final class V1TenchatAdvertisementsStatisticsRequest
{

    public function __construct(
        public readonly int $advertisementId,
        public readonly DateTimeImmutable $dateFrom,
        public readonly DateTimeImmutable $dateTo,
    ) {
    }

}
