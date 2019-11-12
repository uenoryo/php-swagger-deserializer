<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Components ...
 */
class Components
{
    protected $schemas;

    public function __construct(?array $data = [])
    {
        $this->schemas = new Schemas($data['schemas'] ?? []);
    }
}
