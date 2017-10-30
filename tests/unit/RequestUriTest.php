<?php
declare(strict_types=1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

class RequestUriTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_from_valid_uri_strings(): void
    {
        self::assertSame('/', (new RequestUri('/'))->getData());

        self::assertSame('/foo', (new RequestUri('/foo'))->getData());
        self::assertSame('/foo', (new RequestUri('/foo/'))->getData());
        self::assertSame('/foo/bar', (new RequestUri('/foo/bar'))->getData());
        self::assertSame('/foo/bar', (new RequestUri('/foo/bar/'))->getData());

        self::assertSame('/foo', (new RequestUri('/foo?bar'))->getData());
        self::assertSame('/foo', (new RequestUri('/foo/?bar'))->getData());

        self::assertSame('/foo/1/2', (new RequestUri('/foo/1/2/?a?b?c'))->getData());

        self::assertSame('/', (new RequestUri('/////////'))->getData());
        self::assertSame('/', (new RequestUri('////   /////   '))->getData());
        self::assertSame('/', (new RequestUri('////   /////   ?a=b&c#d  '))->getData());

        self::assertSame('/1/2/3/4/5/6/7', (new RequestUri('/1//2///3////4/////5//////6///////7////'))->getData());
        self::assertSame('/1/2/3/4/5', (new RequestUri('/1/ /2//  /3//  //4///  //5   ?a=b&c#d '))->getData());

        self::assertSame('/a/{1}/b/{2}/c/{3}', (new RequestUri('/a/{1}/b/{2}/c/{3}'))->getData());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Uri exceeded the length limit \d+'
     */
    public function it_throws_if_uri_string_is_too_long(): void
    {
        new RequestUri('/'.str_repeat('foo/', 1000));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Uri must start with /
     */
    public function it_throws_if_uri_string_does_not_start_with_slash(): void
    {
        new RequestUri('foo');
    }
}
