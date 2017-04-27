<?php
declare(strict_types = 1);

namespace SFW\Request;

use InvalidArgumentException;

class RequestContentType
{
    public const TYPE_JSON = 'application/json';

    public const VALID_TYPES = [
        self::TYPE_JSON,
    ];

    /** @var string */
    private $contentType;

    public function __construct(string $contentType)
    {
        if (! in_array($contentType, self::VALID_TYPES, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Content type %s is not part of valid content types: %s',
                    $contentType,
                    implode(', ', self::VALID_TYPES)
                )
            );
        }
        $this->contentType = $contentType;
    }

    public function getData(): string
    {
        return $this->contentType;
    }
}
