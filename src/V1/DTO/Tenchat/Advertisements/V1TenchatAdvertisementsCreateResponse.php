<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Advertisements;

use Eridify\SDK\V1\Enum\AdvertiseStatus;

final class V1TenchatAdvertisementsCreateResponse
{

    public function __construct(
        public readonly int $advertisementId,
        public readonly string $name,
        public readonly string $erid,
        public readonly string $targetUrl,
        public readonly int $displayNumberPerUser,
        public readonly int $slotId,
        public readonly string $ageLimitKey,
        public readonly AdvertiseStatus $status,
        public readonly ?string $pictureUrl = null,
        public readonly ?string $comment = null,
    ) {
    }

}
