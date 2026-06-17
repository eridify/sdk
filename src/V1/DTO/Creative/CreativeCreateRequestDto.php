<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

use Eridify\SDK\Exception\ArgumentInvalidException;

/**
 * Тело POST {@code /ext/v1/creatives/create}.
 *
 * Поля и обязательность соответствуют {@code CreativeCreateDTOExtractor} и
 * {@code CreativeFieldsDTOExtractor} (create, {@code filesOptional = false}).
 */
final class CreativeCreateRequestDto
{

    /**
     * @param list<Kktu> $kktuCodes
     * @param list<resource> $files потоки файлов ({@see fopen}, {@see tmpfile}); в multipart уходят как uploaded file
     * @param list<RfRegion> $audienceRegionIds
     * @param list<CreativeAudienceAgeIntervalDto> $audienceAgeIntervals
     * @param list<int> $initialContractIds
     * @param list<string> $links
     * @param list<string> $textBlocks
     */
    public function __construct(
        public readonly int $organizationId,
        public readonly string $title,
        public readonly CreativeType $creativeType,
        public readonly array $kktuCodes,
        public readonly array $files,
        public readonly bool $isSelfPromotion = false,
        public readonly bool $isSocialQuotaAdvertising = false,
        public readonly bool $isSocialAdvertising = false,
        public readonly bool $isCoBranding = false,
        public readonly ?string $advertisedObjectBrand = null,
        public readonly ?string $advertisedObjectCategory = null,
        public readonly ?string $advertisedObjectDescription = null,
        public readonly array $audienceRegionIds = [],
        public readonly bool $audienceIsAllRussia = false,
        public readonly ?AudienceGender $audienceGender = null,
        public readonly array $audienceAgeIntervals = [],
        public readonly array $initialContractIds = [],
        public readonly ?int $customerCounterpartyId = null,
        public readonly array $links = [],
        public readonly array $textBlocks = [],
    ) {
        foreach ($files as $file) {
            if (!is_resource($file) || get_resource_type($file) !== 'stream') {
                throw new ArgumentInvalidException('Каждый элемент files должен быть stream resource');
            }
        }
    }

}
