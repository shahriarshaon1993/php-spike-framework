<?php

namespace Spike\core;

use Spike\core\exception\NotFoundException;

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
        $method = $this->request->method();
        $callback = self::$routes[$method][$path] ?? false;

        if ($callback === false) {
            throw new NotFoundException();
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            /** @var \app\core\controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }
 
    /**
     * Render the main view
     *
     * @param string $view
     * @param array $params
     * @return void
     */
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

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
        $layout = Application::$app->controller->layout ?? 'main';
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/resources/views/layouts/$layout.php";
        return ob_get_clean();
    }
    
    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/resources/views/$view.php";
        return ob_get_clean();
    }
}