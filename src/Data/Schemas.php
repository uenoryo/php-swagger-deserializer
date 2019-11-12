<?php

namespace Umab\Swagger\Data;

use IteratorAggregate;
use Umab\Swagger\Util\Readable;

/**
 * Schemas ...
 */
class Schemas implements IteratorAggregate
{
    use Readable;

    protected $schemasByName;

    public function __construct(?array $data = [])
    {
        if (! is_array($data)) {
            return;
        }

        foreach ($data as $name => $schema) {
            $this->schemasByName[$name] = "a";
        }
    }

    function getIterator()
    {
        foreach ($this->schemasByName as $key => $val) {
            yield $key => $val;
        }
    }
}
