<?php

declare(strict_types = 1);

namespace Eridify\SDK\Tests;

use Eridify\SDK\Tests\Utils\Utils as ApiTestUtils;
use PHPUnit\Framework\TestCase;

final class ExtClientPingTest extends TestCase
{

    use ApiTestUtils;

    public function testPingReturnsPong(): void
    {
        $sdk = $this->createTestApiWithSuccessResponse('Pong');

        $ping = $sdk->v1->ping->execute();
        self::assertSame('Pong', $ping);
    }

    public function testRequestUsesPostAndFullPath(): void
    {
        $sdk = $this->createTestApiWithSuccessResponse('Pong', $container);
        $sdk->v1->ping->execute();

        self::assertCount(1, $container);
        $request = $container[0]['request'];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://example.test/ext/v1/ping', (string) $request->getUri());
    }

}
