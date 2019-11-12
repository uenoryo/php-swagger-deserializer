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

            switch (true) {
                case array_key_exists('allOf', $schema):
                    $obj = new Schema($name, $schema['allOf']);
                    $obj->expectsAllProperties = true;
                    $this->schemasByName[$name] = $obj;
                    break;
                case array_key_exists('anyOf', $schema):
                    $obj = new Schema($name, $schema['anyOf']);
                    $obj->expectsAnyProperties = true;
                    $this->schemasByName[$name] = $obj;
                    break;
                case array_key_exists('oneOf', $schema):
                    $obj = new Schema($name, $schema['oneOf']);
                    $obj->expectsOneProperty = true;
                    $this->schemasByName[$name] = $obj;
                    break;
                default:
                    $this->schemasByName[$name] = new Schema($name, $schema);
            }
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
