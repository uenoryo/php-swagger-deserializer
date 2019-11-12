<?php

namespace Umab\Swagger;

use Umab\Swagger\Util\Readable;
use Umab\Swagger\Data\Info;
use Umab\Swagger\Data\Components;

/**
 * OpenAPIの仕様をそのままデータ構造に落とし込むオブジェクト
 */
class Swagger
{
    use Readable;

    public function __get($name)
    {
        return $this->$name ?? $this->data[$name] ?? null;
    }

    /* @var data */
    protected $data;

    /* @var openapi */
    protected $openApiVersion;

    /* @var info */
    protected $info;

    /* @var servers */
    protected $servers;

    /* @var paths */
    protected $paths;

    /* @var components */
    protected $components;

    /**
     * 配列からSwaggerオブジェクトを生成して返す
     *
     * @param array $data
     * @return Umab\Swagger\Swagger
     */
    public static function new(array $data)
    {
        return new Self($data);
    }

    /**
     * constructor (､´･ω･)▄︻┻┳═一
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setOpenApiVersion($data['openapi']);

        $this->setInfo($data['info']);

        $this->setServers($data['servers']);

        $this->setPaths($data['paths']);

        $this->setComponents($data['components']);
    }

    /**
     * set OpenApiVersion
     *
     * @param string $version
     */
    protected function setOpenApiVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * set Info
     *
     * @param array $info
     */
    protected function setInfo(array $data = [])
    {
        $this->info = new Info($data);
    }

    /**
     * set Servers
     *
     * @param array $servers
     */
    protected function setServers(array $servers)
    {
        //
    }

    /**
     * set Paths
     *
     * @param array $paths
     */
    protected function setPaths(array $paths)
    {
        //
    }

    /**
     * set Components
     *
     * @param array $components
     */
    protected function setComponents(array $data = [])
    {
        $this->components = new Components($data);
    }
}
