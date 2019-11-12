<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Schema ...
 */
class Schema
{
    use Readable;

    protected $name;

    public $expectsAllProperties;

    public $expectsAnyProperties;

    public $expectsOneProperty;

    protected $properties;

    public function __construct($name, $data = [])
    {
        $this->name = $name ?? '';

        $this->properties = [];

        // 通常の配列の場合は、複数のオブジェクトで構成されたschema
        if (array_values($data) === $data) {
            foreach ($data as $d) {
                if (array_key_exists('$ref', $d)) {
                    $this->properties[] = new Property($d, $d);
                } else {
                    $this->properties[] = new Property('', $d);
                }
            }
        } else {
            $this->properties[] = new Property('', $data);
        }
    }
}
