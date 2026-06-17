<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

/**
 * Успешный {@code response} POST списка креативов: ключи {@code items}, {@code count}.
 *
 * Для параметра второго типа аргумента к {@see \Eridify\SDK\V1\DTO\Common\ApiResponseDto} см. успешную форму узла ниже (после {@code json_decode}).
 *
 * @phpstan-type CreativeListSuccessfulApiDecodedResponseShape array{items: list<array<string, mixed>>, count: int}
 * @psalm-type CreativeListSuccessfulApiDecodedResponseShape = array{items: list<array<string, mixed>>, count: int}
 */
final class CreativeListResponseDto
{

    /**
     * @param list<array<string, mixed>> $items
     */
    public function __construct(
        public readonly array $items,
        public readonly int $count,
    ) {
    }

}
