<?php
declare(strict_types=1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

class RequestMethodTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_from_valid_methods(): void
    {
        array_map(function ($method) {
            self::assertSame($method, (new RequestMethod($method))->getData());
        }, RequestMethod::VALID_METHODS);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Method foobar is not part of valid methods: .*'
     */
    public function it_throws_if_methods_is_invalid(): void
    {
        new RequestMethod('foobar');
    }
}
