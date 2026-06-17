<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Spends;

final class V1TenchatSpendsAllocateRequest
{

    /**
     * @param list<int> $spendId
     */
    public function __construct(
        public readonly array $spendId,
        public readonly int $actId,
    ) {
    }

}
