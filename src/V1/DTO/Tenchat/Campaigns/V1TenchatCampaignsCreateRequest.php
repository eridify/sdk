<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Campaigns;

use DateTimeImmutable;

final class V1TenchatCampaignsCreateRequest
{

    /**
     * @param list<string>|null $cities
     */
    public function __construct(
        public readonly string $ogrn,
        public readonly string $name,
        public readonly DateTimeImmutable $startDate,
        public readonly DateTimeImmutable $endDate,
        public readonly int $budget,
        public readonly int $cpm,
        public readonly int $displayNumber,
        public readonly ?array $cities = null,
        public readonly ?string $comment = null,
    ) {
    }

}
