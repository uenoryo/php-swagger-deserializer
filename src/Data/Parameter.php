<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Parameter ...
 */
class Parameter
{
    use Readable;

    protected $name;

    protected $in;

    protected $description;

    protected $required;

    protected $style;

    protected $schema;

    public function __construct($data = [])
    {
        $this->name = $data['name'] ?? '';

        $this->in = $data['in'] ?? '';

        $this->description = $data['description'] ?? '';

        $this->required = $data['required'] ?? false;

        $this->style = $data['style'] ?? '';

        $this->schema = new Schema($data['schema'] ?? []);
    }
}
