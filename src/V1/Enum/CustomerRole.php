<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum CustomerRole: string
{

    case ADVERTISER_PLACER = 'advertiser_placer';
    case AD_SYSTEM_OPERATOR = 'ad_system_operator';
    case AD_AGENCY = 'ad_agency';
    case ADVERTISER = 'advertiser';
    case INTERMEDIARY = 'intermediary';

}
