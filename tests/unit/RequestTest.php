<?php
declare(strict_types = 1);

namespace SFW\Request;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

/**
 * @group request
 */
class RequestTest extends TestCase
{
    /**
     * @test
     */
    public function itCreates(): void
    {
        $now = new DateTimeImmutable();
        $uri = '/foo/bar?a=1&b=2#3';
        $query = ['a' => '1', 'b' => '2'];
        $json = '{"foo": "bar"}';

        $request = new Request(
            $now,
            RequestContentType::TYPE_JSON,
            RequestMethod::POST,
            $uri,
            $query,
            $json
        );

        static::assertSame($now->format(DATE_ATOM), $request->getTime()->format(DATE_ATOM));
        static::assertSame(RequestContentType::TYPE_JSON, $request->getContentType()->getData());
        static::assertSame(RequestMethod::POST, $request->getMethod()->getData());
        static::assertSame('/foo/bar', $request->getUri()->getData());
        static::assertSame($query, $request->getQuery());
        static::assertSame(['foo' =>'bar'], $request->getJson()->getData());
    }
}
