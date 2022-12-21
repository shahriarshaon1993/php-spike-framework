<?php

namespace Spike\core;

class Request
{
    /**
     * get actual path
     *
     * @return string 
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }
    
    /**
     * get current request method
     *
     * @return String
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}