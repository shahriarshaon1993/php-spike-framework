<?php

namespace Spike\core;

class Route
{
    public Request $request;
    public Response $response;

    protected static $routes = [];
        
    /**
     * 
     * @param  Object $request
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
     * post
     *
     * @param string $path
     * @param callable $callback
     * @return void
     */
    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }
        
    /**
     * Route go to right way
     *
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = self::$routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }
    
    /**
     * Render the main view
     *
     * @param string $view
     * @return void
     */
    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    
    /**
     * renderContent
     *
     * @param  mixed $viewContent
     * @return string
     */
    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/resources/views/layouts/main.php";
        return ob_get_clean();
    }
    
    protected function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/resources/views/$view.php";
        return ob_get_clean();
    }
}