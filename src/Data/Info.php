<?php

namespace Umab\Swagger;

/**
 * Info ...
 */
class Info
{
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

    /** @var licence */
    protected $licence;

    public function __construct(array $data = [])
    {
        $this->version = $data['version'] ?? "";

        $this->title = $data['title'] ?? "";

        $this->description = $data['description'] ?? "";

        $this->termsOfService = $data['termsOfService'] ?? "";

        $this->contact = new Contact($data['contact'] ?? null);

        $this->licence = new Licence($data['licence'] ?? null);
    }
}
