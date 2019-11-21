<?php

namespace Umab\Swagger\Data;

use ArrayObject;
use IteratorAggregate;
use Umab\Swagger\Util\Readable;

/**
 * Schemas ...
 */
class Schemas extends ArrayObject implements IteratorAggregate
{
    use Readable;

    protected $schemasByName;

    public function __construct(?array $data = [])
    {
        if (! is_array($data)) {
            return;
        }

        foreach ($data as $name => $schema) {
            if ($schema === null || $schema === []) {
                continue;
            }
            $this->schemasByName[$name] = new Schema($schema);
        }
    }

    public function offsetGet($name)
    {
        return $this->schemasByName[$name] ?? null;
    }

    function getIterator()
    {
        foreach ($this->schemasByName as $key => $val) {
            yield $key => $val;
        }
    }
}
