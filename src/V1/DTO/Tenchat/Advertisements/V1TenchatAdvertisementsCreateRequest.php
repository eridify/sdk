<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Tenchat\Advertisements;

use Eridify\SDK\Exception\ArgumentInvalidException;

final class V1TenchatAdvertisementsCreateRequest
{

    /**
     * @param list<string> $kktuCodes
     * @param resource $banner
     */
    public function __construct(
        public readonly int $initialContractId,
        public readonly array $kktuCodes,
        public readonly int $campaignId,
        public readonly int $slotId,
        public readonly string $ageLimitKey,
        public readonly string $name,
        public readonly string $erid,
        public readonly string $targetUrl,
        public readonly int $displayNumberPerUser,
        public readonly mixed $banner,
        public readonly ?string $comment = null,
    ) {
        if (!is_resource($banner) || get_resource_type($banner) !== 'stream') {
            throw new ArgumentInvalidException('banner должен быть stream resource');
        }
    }

}
