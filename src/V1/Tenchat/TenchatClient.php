<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Tenchat;

use Eridify\SDK\Http\HttpClient;

final class TenchatClient
{

    public readonly CampaignsEndpoint $campaigns;
    public readonly SlotsEndpoint $slots;
    public readonly AgeLimitsEndpoint $ageLimits;
    public readonly AdvertisementsEndpoint $advertisements;
    public readonly SpendsEndpoint $spends;

    public function __construct(HttpClient $transport)
    {
        $this->campaigns = new CampaignsEndpoint($transport);
        $this->slots = new SlotsEndpoint($transport);
        $this->ageLimits = new AgeLimitsEndpoint($transport);
        $this->advertisements = new AdvertisementsEndpoint($transport);
        $this->spends = new SpendsEndpoint($transport);
    }

}
