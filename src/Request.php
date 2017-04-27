<?php
declare(strict_types = 1);

namespace SFW\Request;

use DateTimeImmutable;

class Request
{
    /** @var DateTimeImmutable */
    private $time;

    /** @var RequestContentType */
    private $contentType;

    /** @var RequestMethod */
    private $method;

    /** @var RequestUri */
    private $uri;

    /** @var array */
    private $query;

    /** @var RequestJson */
    private $json;

    public function __construct(
        DateTimeImmutable $time,
        string $contentType,
        string $method,
        string $uri,
        array $query,
        string $json
    ) {
        $this->time = $time;
        $this->contentType = new RequestContentType($contentType);
        $this->method = new RequestMethod($method);
        $this->uri = new RequestUri($uri);
        $this->query = $query;
        $this->json = new RequestJson($json);
    }

    public function getContentType(): RequestContentType
    {
        return $this->contentType;
    }

    public function getMethod(): RequestMethod
    {
        return $this->method;
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->time;
    }

    public function getUri(): RequestUri
    {
        return $this->uri;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getJson(): RequestJson
    {
        return $this->json;
    }
}
