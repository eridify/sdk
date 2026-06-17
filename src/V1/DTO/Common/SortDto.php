<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Common;

/**
 * Часть тела запроса: ключ {@code sort} — {@code field}, {@code direction} ({@code asc} | {@code desc}).
 *
 * Набор допустимых {@code field} задаёт конкретный эндпойнт на сервере (для списка креативов — см. бэкенд).
 */
final class SortDto
{

    public function __construct(
        public readonly string $field,
        public readonly string $direction,
    ) {
    }

}
