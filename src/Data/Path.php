<?php

namespace Umab\Swagger\Data;

use Umab\Swagger\Util\Readable;

/**
 * Path ...
 */
class Path
{
    use Readable;

    protected $method;

    protected $endpoint;

    protected $description;

    protected $operationId;

    protected $parameters;

    protected $requestBody;

    protected $responses;

    public function __construct($endpoint, $method, $data = [])
    {
        $this->method = $this->methodFromString($method);

        $this->endpoint = $endpoint;

        $this->description = $data['description'] ?? '';

        $this->operationId = $data['operationId'] ?? '';

        $this->parameters = [];
        foreach ($data['parameters'] ?? [] as $param) {
            $this->parameters[] = new Parameter($param);
        }

        $this->requestBody = new RequestBody($data['requestBody'] ?? []);

        $this->responses = [];
    }

    protected function methodFromString($str)
    {
        switch ($str)
        {
            case 'get':
                return RequestMethod::Get();
            case 'head':
                return RequestMethod::Head();
            case 'post':
                return RequestMethod::Post();
            case 'put':
                return RequestMethod::Put();
            case 'delete':
                return RequestMethod::Delete();
            case 'connect':
                return RequestMethod::Connect();
            case 'options':
                return RequestMethod::Options();
            case 'trace':
                return RequestMethod::Trace();
            case 'patch':
                return RequestMethod::Patch();
            default:
                throw new InvalidArgumentException("unexpected request method: " . $str);
        }
    }
}
