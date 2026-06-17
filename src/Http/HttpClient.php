<?php

declare(strict_types = 1);

namespace Eridify\SDK\Http;

use Eridify\SDK\Enum\ErrorCode;
use Eridify\SDK\Exception\ApiException;
use Eridify\SDK\Exception\BaseException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Utils;

final class HttpClient
{

    public const BASE_URI = 'https://eridify.ru';

    private readonly ?ClientInterface $client;

    public function __construct(
        private readonly string $apiKey,
        ?ClientInterface $client = null,
    ) {
        if ($client) {
            $this->client = $client;
        } else {
            $this->client = new \GuzzleHttp\Client(['base_uri' => self::BASE_URI]);
        }
    }

    public function requestJson(string $path, array $data = []): mixed
    {
        return $this->innerRequest(fn() => $this->client->request('POST', $path, [
            RequestOptions::JSON    => $data,
            RequestOptions::HEADERS => ['Authorization' => 'Bearer ' . $this->apiKey],
        ]));
    }

    public function requestMultipart(string $path, array $multipart): mixed
    {
        return $this->innerRequest(fn() => $this->client->request('POST', $path, [
            RequestOptions::MULTIPART => $multipart,
            RequestOptions::HEADERS   => ['Authorization' => 'Bearer ' . $this->apiKey],
        ]));
    }

    private function innerRequest(callable $cb): mixed
    {
        try {
            $response = $cb();
        } catch (RequestException $exception) {
            if ($exceptionResponse = $exception->getResponse()) {
                throw new \Eridify\SDK\Exception\HttpException(
                    $exceptionResponse,
                    $exception->getMessage(),
                    $exceptionResponse->getStatusCode(),
                    $exception,
                );
            }

            throw new BaseException(
                'Неизвестная ошибка',
                0,
                $exception,
            );
        }

        $responseString = $response->getBody()->getContents();
        try {
            $decodedArray = Utils::jsonDecode($responseString, true);
        } catch (\GuzzleHttp\Exception\InvalidArgumentException $exception) {
            throw new BaseException('От сервера пришел невалидный JSON', 0, $exception);
        }

        if (!isset($decodedArray['isOk'])) {
            throw new BaseException('Не получено ожидаемое поле "isOk"');
        }

        if ($decodedArray['isOk']) {
            return $decodedArray['response'];
        }

        throw new ApiException(
            $response,
            $decodedArray['error']['message'],
            ErrorCode::tryFrom($decodedArray['error']['code'] ?? 0) ?? ErrorCode::UNDEFINED,
            $decodedArray['error']['data'] ?? [],
        );
    }

}
