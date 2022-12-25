<?php

namespace Spike\core;

class Controller
{
    public function render($view, $params = [])
    {
        return Application::$app->route->renderView($view, $params);
    }
}