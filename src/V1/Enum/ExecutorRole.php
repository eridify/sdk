<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum ExecutorRole: string
{

    case ADVERTISER = 'advertiser';
    case AGENCY = 'agency';
    case AD_SYSTEM = 'ad_system';
    case PUBLISHER = 'publisher';
    case INTERMEDIARY = 'intermediary';

}
