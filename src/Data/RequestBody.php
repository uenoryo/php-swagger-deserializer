<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * RequestBody ...
 */
class RequestBody
{
    use Readable;

    protected $description;

    protected $content;

    public function __construct($data)
    {
        $this->description = $data['description'] ?? '';

        if (is_array($data['content'])) {
            foreach ($data['content'] as $type => $info) {
                $this->content = new Content($type, $info);

                // contentは1つだけの想定
                break;
            }
        }
    }
}
