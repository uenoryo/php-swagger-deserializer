<?php

namespace Umab\Swagger\Data;

/**
 * Licence ...
 */
class Licence
{
    /** @var name */
    protected $name;

    /** @var url */
    protected $url;

    public function __construct(array $data = [])
    {
        $this->name = $data['name'] ?? "";

        $this->url = $data['url'] ?? "";
    }
}
