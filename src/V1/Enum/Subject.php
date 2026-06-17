<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum Subject: string
{

    case OTHER = 'other';
    case ADVERTISING_DISTRIBUTION = 'advertising_distribution';
    case INTERMEDIATION = 'intermediation';
    case REPRESENTATION = 'representation';
    case ADVERTISING_ORGANIZATION = 'advertising_organization';

}
