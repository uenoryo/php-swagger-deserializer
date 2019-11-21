<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Schema ...
 */
class Schema
{
    use Readable;

    protected $type;

    protected $in;

    protected $description;

    protected $required;

    protected $style;

    protected $item;

    protected $properties;

    public function __construct($data = [])
    {
        $this->type = $data['type'] ?? '';

        $this->format = $data['format'] ?? '';

        $this->description = $data['description'] ?? '';

        // 配列
        if ($this->type === 'array') {
            $this->item = new self($data['items'] ?? []);
        }

        // オブジェクト
        $this->properties = [];
        if ($this->type === 'object') {
            $this->required = $data['required'] ?? [];

            foreach ($data['properties'] ?? [] as $name => $d) {
                $this->properties[$name] = new self($d);
            }
        }
    }
}
