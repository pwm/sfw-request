<?php
declare(strict_types = 1);

namespace SFW\Request;

use InvalidArgumentException;

class RequestMethod
{
    public const GET    = 'GET';
    public const POST   = 'POST';
    public const PUT    = 'PUT';
    public const PATCH  = 'PATCH';
    public const DELETE = 'DELETE';

    public const VALID_METHODS = [
        self::GET,
        self::POST,
        self::PUT,
        self::PATCH,
        self::DELETE,
    ];

    /** @var string */
    private $method;

    public function __construct(string $method)
    {
        if (! in_array($method, self::VALID_METHODS, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Method %s is not part of valid methods: %s',
                    $method,
                    implode(', ', self::VALID_METHODS)
                )
            );
        }
        $this->method = $method;
    }

    public function getData(): string
    {
        return $this->method;
    }
}
