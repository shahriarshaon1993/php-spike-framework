<?php

namespace Spike\core;

use Spike\core\services\RouteServices;

class Application
{
    public RouteServices $service;
    public Request $request;
    public Route $route;

    public function __construct()
    {
        $this->request = new Request();
        $this->service = new RouteServices();
        $this->route = new Route($this->request);
    }

    public function run()
    {
        $this->service->boot();
        $this->route->resolve();
    }
}