<?php
declare(strict_types=1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

class RequestContentTypeTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_from_valid_types(): void
    {
        array_map(function ($contentType) {
            self::assertSame($contentType, (new RequestContentType($contentType))->getData());
        }, RequestContentType::VALID_TYPES);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Content type foobar is not part of valid content types: .*'
     */
    public function it_throws_if_content_type_is_invalid(): void
    {
        new RequestContentType('foobar');
    }
}
