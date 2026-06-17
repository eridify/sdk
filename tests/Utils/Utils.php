<?php

declare(strict_types = 1);

namespace Eridify\SDK\Tests\Utils;

use Eridify\SDK\Api;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

trait Utils
{

    /**
     * @return non-empty-string
     */
    private function apiSuccessJson(mixed $response): string
    {
        /** @var non-empty-string $json */
        $json = json_encode([
            'isOk'     => true,
            'response' => $response,
        ], JSON_THROW_ON_ERROR);

        return $json;
    }

    /**
     * Guzzle-клиент с mock-ответом и {@see Api} поверх него.
     *
     * @param list<array<string, mixed>>|null $requestHistory если передан — заполняется middleware {@see Middleware::history}
     */
    private function createTestApi(string $responseBody, ?array &$requestHistory = null): Api
    {
        $mock = new MockHandler([
            new Response(200, [], $responseBody),
        ]);

        $handler = HandlerStack::create($mock);

        if (!isset($requestHistory)) {
            $requestHistory = [];
        }
        $handler->push(Middleware::history($requestHistory));

        $client = new Client([
            'base_uri'    => 'https://example.test/',
            'handler'     => $handler,
            'http_errors' => false,
        ]);

        return new Api('', $client);
    }

    /**
     * @param list<array<string, mixed>>|null $requestHistory
     */
    private function createTestApiWithSuccessResponse(mixed $responsePayload, ?array &$requestHistory = null): Api
    {
        return $this->createTestApi($this->apiSuccessJson($responsePayload), $requestHistory);
    }

}
