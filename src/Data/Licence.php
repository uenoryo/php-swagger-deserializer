<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Licence ...
 */
class Licence
{
    use Readable;

    /** @var data */
    protected $data;

    /** @var name */
    protected $name;

    /** @var url */
    protected $url;

    public function __construct(array $data = [])
    {
        $this->data = $data;

        $this->name = $data['name'] ?? "";

        $this->url = $data['url'] ?? "";
    }
}
