<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Campaigns;

use DateTimeImmutable;
use Eridify\SDK\V1\Enum\AdvertiseStatus;

final class V1TenchatCampaignsGetResponse
{

    /**
     * @param list<string> $cities
     */
    public function __construct(
        public readonly int $campaignId,
        public readonly string $ogrn,
        public readonly string $name,
        public readonly DateTimeImmutable $startDate,
        public readonly DateTimeImmutable $endDate,
        public readonly int $budget,
        public readonly int $cpm,
        public readonly int $displayNumber,
        public readonly array $cities,
        public readonly AdvertiseStatus $status,
        public readonly ?string $comment = null,
    ) {
    }

}
