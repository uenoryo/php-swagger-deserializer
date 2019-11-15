<?php

namespace Umab\Swagger\Data;

/**
 * RequestMethod ...
 */
class RequestMethod
{
    const REQUEST_METHOD_GET     = 1;
    const REQUEST_METHOD_HEAD    = 2;
    const REQUEST_METHOD_POST    = 3;
    const REQUEST_METHOD_PUT     = 4;
    const REQUEST_METHOD_DELETE  = 5;
    const REQUEST_METHOD_CONNECT = 6;
    const REQUEST_METHOD_OPTIONS = 7;
    const REQUEST_METHOD_TRACE   = 8;
    const REQUEST_METHOD_PATCH   = 9;

    protected $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get ...
     */
    public static function Get()
    {
        return new Self(REQUEST_METHOD_GET);
    }

    /**
     * Head ...
     */
    public static function Head()
    {
        return new Self(REQUEST_METHOD_HEAD);
    }

    /**
     * Post ...
     */
    public static function Post()
    {
        return new Self(REQUEST_METHOD_POST);
    }
    /**
     * Put ...
     */
    public static function Put()
    {
        return new Self(REQUEST_METHOD_PUT);
    }

    /**
     * Delete ...
     */
    public static function Delete()
    {
        return new Self(REQUEST_METHOD_DELETE);
    }

    /**
     * Connect ...
     */
    public static function Connect()
    {
        return new Self(REQUEST_METHOD_CONNECT);
    }

    /**
     * Options ...
     */
    public static function Options()
    {
        return new Self(REQUEST_METHOD_OPTIONS);
    }

    /**
     * Trace ...
     */
    public static function Trace()
    {
        return new Self(REQUEST_METHOD_TRACE);
    }

    /**
     * Patch ...
     */
    public static function Patch()
    {
        return new Self(REQUEST_METHOD_PATCH);
    }

    /**
     * isGet ...
     */
    public function isGet()
    {
        return $this->value === REQUEST_METHOD_GET;
    }

    /**
     * isHead ...
     */
    public function isHead()
    {
        return $this->value === REQUEST_METHOD_HEAD;
    }

    /**
     * isPost ...
     */
    public function isPost()
    {
        return $this->value === REQUEST_METHOD_POST;
    }

    /**
     * isPut ...
     */
    public function isPut()
    {
        return $this->value === REQUEST_METHOD_PUT;
    }

    /**
     * isDelete ...
     */
    public function isDelete()
    {
        return $this->value === REQUEST_METHOD_DELETE;
    }

    /**
     * isConnect ...
     */
    public function isConnect()
    {
        return $this->value === REQUEST_METHOD_CONNECT;
    }

    /**
     * isOptions ...
     */
    public function isOptions()
    {
        return $this->value === REQUEST_METHOD_OPTIONS;
    }

    /**
     * isTrace ...
     */
    public function isTrace()
    {
        return $this->value === REQUEST_METHOD_TRACE;
    }

    /**
     * isPatch ...
     */
    public function isPatch()
    {
        return $this->value === REQUEST_METHOD_PATCH;
    }
}
