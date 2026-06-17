<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

use Eridify\SDK\V1\DTO\Common\PaginationDto;
use Eridify\SDK\V1\DTO\Common\SortDto;

/**
 * Тело POST {@code /ext/v1/creatives/list}: те же ключи JSON, что ожидает CreativeFilterDTOExtractor на бэкенде.
 */
final class CreativeListRequestDto
{

    /**
     * @param list<string>|null $adTypes
     */
    public function __construct(
        public readonly int $organizationId,
        public readonly ?string $search = null,
        public readonly ?CreativeType $creativeType = null,
        public readonly ?string $brand = null,
        public readonly ?string $category = null,
        public readonly ?array $adTypes = null,
        public readonly ?int $customerCounterpartyId = null,
        public readonly ?string $kcptCode = null,
        public readonly ?string $audience = null,
        public readonly ?int $initialContractId = null,
        public readonly ?SortDto $sort = null,
        public readonly ?PaginationDto $paginate = null,
    ) {
    }

}
