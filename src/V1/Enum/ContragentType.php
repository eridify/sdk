<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum ContragentType: string
{

    case INDIVIDUAL = 'individual';
    case LEGAL = 'legal';
    case ENTREPRENEUR = 'entrepreneur';
    case FOREIGN_INDIVIDUAL = 'foreign_individual';
    case FOREIGN_LEGAL = 'foreign_legal';

}
