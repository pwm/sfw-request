<?php
declare(strict_types = 1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

/**
 * @group request
 */
class RequestMethodTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesFromValidMethods(): void
    {
        array_map(function ($method) {
            static::assertSame($method, (new RequestMethod($method))->getData());
        }, RequestMethod::VALID_METHODS);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Method foobar is not part of valid methods: .*'
     */
    public function itThrowsIfMethodsIsInvalid(): void
    {
        new RequestMethod('foobar');
    }
}
