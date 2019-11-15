<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Server ...
 */
class Server
{
    use Readable;

    protected $url;

    public function __construct($data)
    {
        $this->url = $data['url'] ?? '';
    }
}
