<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Response ...
 */
class Response
{
    use Readable;

    protected $statusCode;

    protected $description;

    protected $content;

    public function __construct($statusCode, $data)
    {
        $this->statusCode = $statusCode ?? '';

        $this->description = $data['description'] ?? '';

        if (isset($data['content']) && is_array($data['content'])) {
            foreach ($data['content'] as $type => $info) {
                $this->content = new Content($type, $info);

                // contentは1つだけの想定
                break;
            }
        }
    }
}
