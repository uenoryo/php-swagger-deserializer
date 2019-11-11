<?php

namespace Umab\Swagger\Util;

/**
 * 自身のフィールドに読み取りアクセス可能にする
 * また、定義されたフィールドのデータがなければ $data 配列 にアクセスして取得を試みる
 */
trait Readable
{
    public function __get($name)
    {
        return $this->$name ?? $this->data[$name] ?? null;
    }
}
