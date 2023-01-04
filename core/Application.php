<?php

namespace Spike\core;

use Spike\core\services\RouteServices;

class Application
{
    public string $layout = 'main';
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
}