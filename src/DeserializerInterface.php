<?php

namespace Umab\Swagger;

interface DeserializerInterface
{
    public function deserialize(string $filepath);
}
