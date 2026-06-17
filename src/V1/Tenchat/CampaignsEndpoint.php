<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\Paths;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsCreateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsCreateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsGetResponse;
use Eridify\SDK\V1\V1Codec;

final class CampaignsEndpoint
{

    public function __construct(
        private readonly HttpClient $transport,
    ) {
    }

    public function create(V1TenchatCampaignsCreateRequest $request): V1TenchatCampaignsCreateResponse
    {
        return V1Codec::tenchatCampaignCreateFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_TENCHAT_CAMPAIGNS_CREATE,
                V1Codec::tenchatCampaignCreateRequestToArray($request),
            ),
        );
    }

    public function get(int $campaignId): V1TenchatCampaignsGetResponse
    {
        return V1Codec::tenchatCampaignGetFromPayload(
            $this->transport->requestJson(
                Paths::EXT_V1_TENCHAT_CAMPAIGNS_GET,
                ['campaignId' => $campaignId],
            ),
        );
    }

    public function start(int $campaignId): void
    {
        $this->transport->requestJson(
            Paths::EXT_V1_TENCHAT_CAMPAIGNS_START,
            ['campaignId' => $campaignId],
        );
    }

    public function stop(int $campaignId): void
    {
        $this->transport->requestJson(
            Paths::EXT_V1_TENCHAT_CAMPAIGNS_STOP,
            ['campaignId' => $campaignId],
        );
    }

}
