<?php

declare(strict_types = 1);

namespace Eridify\SDK\Enum;

enum ErrorCode: int
{

    case UNDEFINED = 0;
    case AUTH_REQUIRED = 1;
    case RATE_LIMIT = 3;
    case VALIDATION = 4;

}
