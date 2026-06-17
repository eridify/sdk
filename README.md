# eridify/sdk

PHP-библиотека для работы с API [eridify](https://eridify.ru).

## Установка

```bash
composer require eridify/sdk
```

## Использование

Получите API-ключ в личном кабинете eridify и передайте его при создании клиента:

```php
use Eridify\SDK\Api;
use Eridify\SDK\V1\DTO\Common\PaginationDto;
use Eridify\SDK\V1\DTO\Creative\CreativeListRequestDto;

$api = new Api('ваш-api-ключ');

// Проверка доступности
$pong = $api->v1->ping->execute();

// Список креативов
$list = $api->v1->creatives->listCreatives(
    new CreativeListRequestDto(
        organizationId: 1,
        paginate: new PaginationDto(page: 1, count: 10),
    ),
);
```

Методы сгруппированы по разделам: `$api->v1->creatives`, `$api->v1->contragents`, `$api->v1->contracts`, `$api->v1->acts`, `$api->v1->tenchat` и другие.

## Ошибки

SDK выбрасывает исключения из пространства имён `Eridify\SDK\Exception`. Все они наследуются от `BaseException`.

### Типы исключений

| Исключение | Когда возникает |
|------------|-----------------|
| `ApiException` | Сервер вернул бизнес-ошибку (`isOk: false`) — неверные данные, нет доступа, превышен лимит и т.п. |
| `HttpException` | HTTP-ошибка сетевого уровня (например, 401, 403, 500) |
| `ArgumentInvalidException` | Некорректные аргументы на стороне клиента до отправки запроса (например, файл передан не как stream resource) |
| `BaseException` | Прочие сбои SDK: сеть без ответа, невалидный JSON, неожиданный формат ответа |

### ApiException

Содержит поля:

- `errorCode` — код ошибки (`Eridify\SDK\Enum\ErrorCode`)
- `data` — дополнительные данные от сервера (массив)
- `response` — HTTP-ответ
- `getMessage()` — текст ошибки для пользователя

```php
use Eridify\SDK\Enum\ErrorCode;
use Eridify\SDK\Exception\ApiException;
use Eridify\SDK\Exception\ArgumentInvalidException;
use Eridify\SDK\Exception\HttpException;

try {
    $api->v1->acts->create(/* ... */);
} catch (ApiException $e) {
    match ($e->errorCode) {
        ErrorCode::AUTH_REQUIRED => /* нет доступа */,
        ErrorCode::VALIDATION    => /* ошибка в данных: $e->data */,
        ErrorCode::RATE_LIMIT    => /* слишком много запросов */,
        ErrorCode::UNDEFINED     => /* прочая ошибка */,
    };
} catch (ArgumentInvalidException $e) {
    // ошибка в аргументах до запроса
} catch (HttpException $e) {
    // HTTP-статус: $e->getCode()
}
```

### Коды ошибок (ErrorCode)

Enum `Eridify\SDK\Enum\ErrorCode`:

| Код | Enum | Описание |
|-----|------|----------|
| `0` | `UNDEFINED` | Неизвестная или необработанная ошибка |
| `1` | `AUTH_REQUIRED` | Нет доступа: неверный API-ключ или недостаточно прав |
| `3` | `RATE_LIMIT` | Превышен лимит запросов |
| `4` | `VALIDATION` | Ошибка валидации данных запроса |

При неизвестном числовом коде SDK подставляет `ErrorCode::UNDEFINED`.

