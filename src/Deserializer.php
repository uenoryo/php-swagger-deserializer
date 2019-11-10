<?php

namespace Umab\Swagger;

use SplFileInfo;
use DomainException;
use Symfony\Component\Yaml\Yaml;

/**
 * Deserializer はswaggerの定義ファイルをロードし、Swaggerオブジェクトに変換して返す
 */
class Deserializer implements DeserializerInterface
{
    /**
     * swaggerの定義ファイルをロードし、Swaggerオブジェクトに変換して返す
     *
     * @param string $filepath 定義ファイル
     * @todo .yml しか対応していないので .json にも対応させる
     */
    public function deserialize(string $filepath)
    {
        $info = new SplFileInfo($filepath);
        $ext = $info->getExtension();

        switch ($ext) {
            case "yml":
            case "yaml":
                return $this->deserializeYml($filepath);
            default:
                throw new DomainException('unsupported file type: '.$ext);
        }
    }

    protected function deserializeYml(string $filepath)
    {
        $yml = Yaml::parse(file_get_contents($filepath));
        $swagger = Swagger::new($yml);
    }
}
