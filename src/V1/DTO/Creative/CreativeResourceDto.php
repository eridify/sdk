<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

/**
 * Одна запись креатива во {@code response} после успешного создания или внутри элементов списка.
 *
 * Для параметра второго типа аргумента к {@see \Eridify\SDK\V1\DTO\Common\ApiResponseDto} при успешном создании — форма узла ниже после {@code json_decode}.
 *
 * @phpstan-type CreativeCreatedSuccessfulApiDecodedResponseShape array<string, mixed>
 * @psalm-type CreativeCreatedSuccessfulApiDecodedResponseShape = array<string, mixed>
 */
final class CreativeResourceDto
{

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(
        public readonly array $data,
    ) {
    }

}
