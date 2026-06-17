<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum AdvertiseStatus: string
{

    case ACTIVE = 'ACTIVE';
    case STOPPED = 'STOPPED';
    case ENDED = 'ENDED';

}
