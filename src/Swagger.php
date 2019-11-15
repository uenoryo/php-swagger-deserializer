<?php

namespace Umab\Swagger;

use Umab\Swagger\Util\Readable;
use Umab\Swagger\Data\Info;
use Umab\Swagger\Data\Server;
use Umab\Swagger\Data\Paths;
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
    public static function new(?array $data = [])
    {
        return new self($data);
    }

    /**
     * constructor (､´･ω･)▄︻┻┳═一
     *
     * @param array $data
     */
    public function __construct(?array $data = [])
    {
        // $refs を解決する
        $data = $this->resolveReferences($data);

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
    protected function setOpenApiVersion(?string $version = '')
    {
        $this->version = $version;
    }

    /**
     * set Info
     *
     * @param array $info
     */
    protected function setInfo(?array $data = [])
    {
        $this->info = new Info($data);
    }

    /**
     * set Servers
     *
     * @param array $servers
     */
    protected function setServers(?array $servers = [])
    {
        $this->serviers = [];
        foreach ($servers as $info) {
            $this->servers[] = new Server($info);
        }
    }

    /**
     * set Paths
     *
     * @param array $paths
     */
    protected function setPaths(?array $data = [])
    {
        $this->paths = new Paths($data);
    }

    /**
     * set Components
     *
     * @param array $components
     */
    protected function setComponents(?array $data = [])
    {
        $this->components = new Components($data);
    }

    /**
     * $ref の参照を解決し、参照先のデータを入れる
     */
    protected function resolveReferences(?array $data = [])
    {
        if (!is_array($data) || count($data) === 0) {
            return;
        }

        $getReference = function ($data, $path) {
            $path = ltrim($path, '#/');
            $keys = explode('/', $path);
            $d = $data;
            foreach ($keys as $key) {
                if (isset($d[$key])) {
                    $d = $d[$key];
                } else {
                    $d = null;
                    break;
                }
            }
            return $d;
        };

        // 再帰的に行うので上限100回
        $maxExecCount = 100;
        for ($i = 0; $i < $maxExecCount; $i++) {
            $executed = false;
            array_walk_recursive($data, function(&$e, $key) use($getReference, $data, $executed) {
                if ($key === "\$ref") {
                    $d = $getReference($data, $e);
                    $e = $d;
                    $executed = true;
                }
            });
            if (! $executed) {
                break;
            }
        }

        // $refs を削除して改装を一段下げる
        $fa = function(&$data) use (&$fa) {
            if (!is_array($data) || !$data) {
                return;
            }

            foreach ($data as $key => &$d) {
                if ($key === "\$ref" && is_array($d)) {
                    foreach ($d as $k => $p) {
                        $data[$k] = $p;
                    }
                    unset($data[$key]);
                }
                $fa($d);
            }
        };
        $fa($data);

        return $data;
    }
}
