<?php

namespace Core;

class Request 
{
    public static function url()
    {
        return trim(str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $_SERVER['REQUEST_URI']), "/");
    }
}