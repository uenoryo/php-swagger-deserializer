<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Info ...
 */
class Info
{
    use Readable;

    /** @var data */
    protected $data;

    /** @var version */
    protected $version;

    /** @var title */
    protected $title;

    /** @var description */
    protected $description;

    /** @var termsOfService */
    protected $termsOfService;

    /** @var contact */
    protected $contact;

    /** @var license */
    protected $license;

    public function __construct(?array $data = [])
    {
        $this->data = $data;

        $this->version = $data['version'] ?? "";

        $this->title = $data['title'] ?? "";

        $this->description = $data['description'] ?? "";

        $this->termsOfService = $data['termsOfService'] ?? "";

        $this->contact = new Contact($data['contact'] ?? null);

        $this->license = new License($data['license'] ?? null);
    }
}
