<?php

namespace App\Router;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require_once '../src/config/routes.php';
    }

    public function run()
    {
        foreach ($this->routes as $route) {
            if ($route->matches($_SERVER['REQUEST_URI'])) {
                $route->callAction();
            }
        }
    }

}