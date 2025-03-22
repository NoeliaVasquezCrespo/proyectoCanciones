<?php

namespace Core;

class App
{
    protected static $dependencias = [];

    public static function set($key, $value)
    {
        static::$dependencias[$key] = $value;
    }

    public static function get($key)
    {
        return static::$dependencias[$key];
    }
}
