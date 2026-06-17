<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

/** Элемент {@code audienceAgeIntervals}. */
final class CreativeAudienceAgeIntervalDto
{

    public function __construct(
        public readonly ?int $from = null,
        public readonly ?int $to = null,
    ) {
    }

}
