<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Slots;

use Eridify\SDK\V1\Enum\SlotStatus;

final class V1TenchatSlotsListResponse
{

    /**
     * @param list<string>|null $places
     */
    public function __construct(
        public readonly string $name,
        public readonly ?int $slotId = null,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
        public readonly ?SlotStatus $status = null,
        public readonly ?array $places = null,
    ) {
    }

}
