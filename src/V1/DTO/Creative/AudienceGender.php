<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

/** Пол целевой аудитории креатива. */
enum AudienceGender: string
{

    case MALE = 'male';
    case FEMALE = 'female';

}
