<?php

namespace Spike\core;

class Route
{
    public Request $request;
    static $routes = [];
        
    /**
     * 
     * @param  Object $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * assign path & in routes array.
     *
     * @param string $path
     * @param callable $callback
     * @return void
     */
    public static function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }
    
    /**
     *
     * @return string
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = self::$routes[$method][$path] ?? false;
        if ($callback === false) {
            echo "Not Found";
            exit;
        }
        echo call_user_func($callback);
    }
}