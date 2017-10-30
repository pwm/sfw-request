<?php
declare(strict_types=1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

class RequestJsonTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_from_valid_json_strings(): void
    {
        //@todo: fix null
        //static::assertSame([], (new RequestJson(''))->getData());
        self::assertSame(['foo' => 'bar'], (new RequestJson('{"foo": "bar"}'))->getData());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Cannot parse json: .*'
     */
    public function it_throws_if_json_string_is_invalid(): void
    {
        new RequestJson('{"foo":}');
    }
}
