<?php
declare(strict_types = 1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

/**
 * @group request
 */
class RequestJsonTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesFromValidJsonStrings(): void
    {
        //@todo: fix null
        //static::assertSame([], (new RequestJson(''))->getData());
        static::assertSame(['foo' => 'bar'], (new RequestJson('{"foo": "bar"}'))->getData());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Cannot parse json: .*'
     */
    public function itThrowsIfJsonStringIsInvalid(): void
    {
        new RequestJson('{"foo":}');
    }
}
