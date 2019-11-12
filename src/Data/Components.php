<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Components ...
 */
class Components
{
    use Readable;

    protected $schemas;

    public function __construct(?array $data = [])
    {
        $this->schemas = new Schemas($data['schemas'] ?? []);
    }
}
