<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Content ...
 */
class Content
{
    use Readable;

    protected $type;

    protected $schema;

    public function __construct($type, $data)
    {
        $this->type = $type ?? '';

        $this->schema = new Schema($data['schema'] ?? []);
    }
}
