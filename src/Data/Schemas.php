<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Schemas ...
 */
class Schemas implements IteratorAggregate
{
    protected $schemasByName;

    public function __construct(?array $data = [])
    {
        if (! is_array($data['schemas'])) {
            return;
        }

        foreach ($data as $name => $schema) {
            $this->schemasByName[$name] = new Schema($schema ?? []);
        }
    }

    function getIterator()
    {
        foreach ($this->schemasByName as $key => $val) {
            yield $key => $val;
        }
    }
}
