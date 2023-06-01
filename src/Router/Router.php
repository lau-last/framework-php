<?php

namespace App\Router;

final class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require_once '../src/Config/routes.php';
    }

    public function run(string $url)
    {
        foreach ($this->routes as $route) {
            if ($route->matches($url)) {
                $route->callAction();
            }
        }
        header('HTTP/1.1 404 Not Found');
        exit;
    }

}