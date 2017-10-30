<?php
declare(strict_types=1);

namespace SFW\Request;

use InvalidArgumentException;

class RequestUri
{
    public const SEPARATOR = '/';

    /** @var string */
    private $uri;

    private const MAX_LENGTH = 2000;

    public function __construct(string $requestUri)
    {
        self::guardInvariants($requestUri);
        $this->uri = self::extractUri($requestUri);
    }

    public function getData(): string
    {
        return $this->uri;
    }

    private static function guardInvariants(string $requestUri): void
    {
        if (strlen($requestUri) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(sprintf('Uri exceeded the length limit %d', self::MAX_LENGTH));
        }
        if (strpos($requestUri, self::SEPARATOR) !== 0) {
            throw new InvalidArgumentException(sprintf('Uri must start with %s', self::SEPARATOR));
        }
    }

    private static function extractUri(string $requestUri): string
    {
        // remove query string, if there is any
        $requestUri = strpos($requestUri, '?') !== false
            ? strstr($requestUri, '?', true)
            : $requestUri;

        // remove spaces, add trailing slash and squash all repeated slashes to single ones
        $requestUri = preg_replace(
            '#'.self::SEPARATOR.'{2,}#',
            self::SEPARATOR,
            str_replace(' ', '', $requestUri) . self::SEPARATOR
        );

        // remove trailing slash, if its not the only character
        return $requestUri !== self::SEPARATOR
            ? substr($requestUri, 0, -1)
            : self::SEPARATOR;
    }
}
