<?php

namespace Umab\Swagger\Data;

/**
 * Contact ...
 */
class Contact
{
    /** @var name */
    protected $name;

    /** @var email */
    protected $email;

    /** @var url */
    protected $url;

    public function __construct(array $data = [])
    {
        $this->name = $data['name'] ?? "";

        $this->email = $data['email'] ?? "";

        $this->url = $data['url'] ?? "";
    }
}
