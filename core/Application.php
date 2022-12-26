<?php

namespace Spike\core;

use Spike\core\services\RouteServices;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public Controller $controller;
    public RouteServices $service;
    public Response $response;
    public Request $request;
    public Route $route;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->service = new RouteServices();
        $this->route = new Route($this->request, $this->response);
    }

    public function run()
    {
        $this->service->boot();
        echo $this->route->resolve();
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
}