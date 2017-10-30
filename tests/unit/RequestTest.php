<?php
declare(strict_types=1);

namespace SFW\Request;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
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

        self::assertSame($now->format(DATE_ATOM), $request->getTime()->format(DATE_ATOM));
        self::assertSame(RequestContentType::TYPE_JSON, $request->getContentType()->getData());
        self::assertSame(RequestMethod::POST, $request->getMethod()->getData());
        self::assertSame('/foo/bar', $request->getUri()->getData());
        self::assertSame($query, $request->getQuery());
        self::assertSame(['foo' =>'bar'], $request->getJson()->getData());
    }
}
