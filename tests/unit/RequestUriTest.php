<?php
declare(strict_types = 1);

namespace SFW\Request;

use PHPUnit\Framework\TestCase;

/**
 * @group request
 */
class RequestUriTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesFromValidUriStrings(): void
    {
        static::assertSame('/', (new RequestUri('/'))->getData());

        static::assertSame('/foo', (new RequestUri('/foo'))->getData());
        static::assertSame('/foo', (new RequestUri('/foo/'))->getData());
        static::assertSame('/foo/bar', (new RequestUri('/foo/bar'))->getData());
        static::assertSame('/foo/bar', (new RequestUri('/foo/bar/'))->getData());

        static::assertSame('/foo', (new RequestUri('/foo?bar'))->getData());
        static::assertSame('/foo', (new RequestUri('/foo/?bar'))->getData());

        static::assertSame('/foo/1/2', (new RequestUri('/foo/1/2/?a?b?c'))->getData());

        static::assertSame('/', (new RequestUri('/////////'))->getData());
        static::assertSame('/', (new RequestUri('////   /////   '))->getData());
        static::assertSame('/', (new RequestUri('////   /////   ?a=b&c#d  '))->getData());

        static::assertSame('/1/2/3/4/5/6/7', (new RequestUri('/1//2///3////4/////5//////6///////7////'))->getData());
        static::assertSame('/1/2/3/4/5', (new RequestUri('/1/ /2//  /3//  //4///  //5   ?a=b&c#d '))->getData());

        static::assertSame('/a/{1}/b/{2}/c/{3}', (new RequestUri('/a/{1}/b/{2}/c/{3}'))->getData());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp 'Uri exceeded the length limit \d+'
     */
    public function itThrowsIfUriStringIsTooLong(): void
    {
        new RequestUri('/'.str_repeat('foo/', 1000));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Uri must start with /
     */
    public function itThrowsIfUriStringDoesNotStartWithSlash(): void
    {
        new RequestUri('foo');
    }
}
