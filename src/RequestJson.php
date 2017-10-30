<?php
declare(strict_types=1);

namespace SFW\Request;

use InvalidArgumentException;

class RequestJson
{
    /** @var array */
    private $data = [];

    public function __construct(string $json, int $depth = 512, int $options = 0)
    {
        if (strlen($json) > 0) {
            //@todo: is it always array?
            $this->data = json_decode($json, true, $depth, $options);
            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new InvalidArgumentException(sprintf('Cannot parse json: %s', json_last_error_msg()));
            }
        }
    }

    public function getData(): array
    {
        return $this->data;
    }
}
