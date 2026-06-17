<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum ContractType: string
{

    case ADDITIONAL_AGREEMENT = 'additional_agreement';
    case SERVICE = 'service';
    case INTERMEDIATION = 'intermediation';

}
