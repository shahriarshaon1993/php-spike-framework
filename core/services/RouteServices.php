<?php

namespace Spike\core\services;

class RouteServices 
{
    public function boot()
    {
        require_once __DIR__.'../../../route/web.php';
    }
}