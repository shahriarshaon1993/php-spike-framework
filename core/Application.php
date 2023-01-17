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
    public Database $db;
    public Session $session;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->db = new Database($config['db']);
        $this->request = new Request();
        $this->response = new Response();
        $this->service = new RouteServices();
        $this->route = new Route($this->request, $this->response);
        $this->session = new Session();
    }

    public function run()
    {
        $this->service->boot();
        echo $this->route->resolve();
    }
}