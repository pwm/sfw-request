<?php
declare(strict_types = 1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

/**
 * @group request
 */
class RequestContentTypeTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesFromValidTypes(): void
    {
        array_map(function ($contentType) {
            static::assertSame($contentType, (new RequestContentType($contentType))->getData());
        }, RequestContentType::VALID_TYPES);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Content type foobar is not part of valid content types: .*'
     */
    public function itThrowsIfContentTypeIsInvalid(): void
    {
        new RequestContentType('foobar');
    }
}
