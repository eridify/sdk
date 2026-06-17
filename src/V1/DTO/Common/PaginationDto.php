<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Common;

/** Часть тела запроса: ключ {@code paginate} — {@code page}, {@code count}. */
final class PaginationDto
{

    public function __construct(
        public readonly int $page,
        public readonly int $count,
    ) {
    }

}
