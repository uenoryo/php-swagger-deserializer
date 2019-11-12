<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Property ...
 */
class Property
{
    use Readable;

    protected $name;

    protected $type;

    protected $required;

    protected $properties;

    /**
     * new はtypeに合わせてPropertyObjectを返す
     */
    public function __construct($name, $data = [])
    {
        $this->name = $name ?? '';

        $this->type = $data['type'] ?? '';

        $this->required = $data['required'] ?? [];

        if ($this->type == 'object') {
            $this->properties = [];
            foreach ($data['properties'] ?? [] as $name => $d) {
                $this->properties[] = new Self($name, $d);
            }
        }

    }
}
