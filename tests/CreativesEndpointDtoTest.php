<?php

declare(strict_types = 1);

namespace Eridify\SDK\Tests;

use Eridify\SDK\Tests\Utils\Utils as ApiTestUtils;
use Eridify\SDK\V1\DTO\Common\PaginationDto;
use Eridify\SDK\V1\DTO\Creative\CreativeCreateRequestDto;
use Eridify\SDK\V1\DTO\Creative\CreativeType;
use Eridify\SDK\V1\DTO\Creative\CreativeListRequestDto;
use Eridify\SDK\V1\DTO\Creative\Kktu;
use PHPUnit\Framework\TestCase;

final class CreativesEndpointDtoTest extends TestCase
{

    use ApiTestUtils;

    public function testListSendsJsonBodyAndMapsEnvelope(): void
    {
        $sdk = $this->createTestApiWithSuccessResponse([
            'items' => [['id' => 'a'], ['id' => 'b']],
            'count' => 2,
        ], $container);

        $req = new CreativeListRequestDto(
            organizationId: 7,
            paginate: new PaginationDto(1, 10),
        );
        $api = $sdk->v1->creatives->listCreatives($req);

        self::assertCount(2, $api->items);
        self::assertSame(2, $api->count);

        self::assertCount(1, $container);
        $body = (string) $container[0]['request']->getBody();
        /** @var array<string, mixed> $parsed */
        $parsed = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        self::assertSame(7, $parsed['organizationId']);
        self::assertSame(1, $parsed['paginate']['page']);
        self::assertSame(10, $parsed['paginate']['count']);
    }

    public function testCreateUsesMultipartBody(): void
    {
        $sdk = $this->createTestApiWithSuccessResponse(['id' => 'x1', 'title' => 'T'], $container);
        $file = self::openFileResource('file', 'banner.jpg');

        try {
            $created = $sdk->v1->creatives->createCreative(
                new CreativeCreateRequestDto(
                    organizationId: 1,
                    title: 'Hello',
                    creativeType: CreativeType::BANNER,
                    kktuCodes: [Kktu::CODE_1],
                    files: [$file],
                ),
            );

            self::assertSame('x1', $created->data['id']);
            self::assertSame('T', $created->data['title']);

            self::assertCount(1, $container);
            $contentType = $container[0]['request']->getHeaderLine('Content-Type');
            self::assertStringContainsString('multipart/form-data', $contentType);
        } finally {
            fclose($file);
        }
    }

    /** @return resource */
    private static function openFileResource(string $content, string $filename): mixed
    {
        $path = tempnam(sys_get_temp_dir(), 'sdk_creative_') . '_' . $filename;
        file_put_contents($path, $content);
        $handle = fopen($path, 'rb');
        self::assertIsResource($handle);

        return $handle;
    }

}
