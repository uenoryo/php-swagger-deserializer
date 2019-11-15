<?php

namespace Umab\Swagger\Data;

use ArrayObject;
use IteratorAggregate;
use Umab\Swagger\Util\Readable;

/**
 * Paths ...
 */
class Paths extends ArrayObject implements IteratorAggregate
{
    use Readable;

    protected $endpointsByPath;

    public function __construct(?array $data = [])
    {
        if (! is_array($data)) {
            return;
        }

        foreach ($data as $path => $infos) {
            $this->endpointsByPath[$path] = [];
            foreach ($infos ?? [] as $method => $info) {
                $obj = new Path($path, $method, $info);
                $this->endpointsByPath[$path][$method] = $obj;
            }
        }
    }

    public function offsetGet($path)
    {
        return $this->endpointsByPath[$path] ?? [];
    }

    function getIterator()
    {
        foreach ($this->endpointsByPath as $key => $val) {
            yield $key => $val;
        }
    }
}
