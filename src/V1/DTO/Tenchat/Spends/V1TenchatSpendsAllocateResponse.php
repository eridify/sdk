<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Spends;

final class V1TenchatSpendsAllocateResponse
{

    public function __construct(
        public readonly int $spendId,
        public readonly bool $allocated,
    ) {
    }

}
