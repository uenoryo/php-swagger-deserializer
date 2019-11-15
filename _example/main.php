<?php

require '../vendor/autoload.php';

use Umab\Swagger\Deserializer;

$d = new Deserializer;

$swagger = $d->deserialize("./swagger.yml");

print_r($swagger);
