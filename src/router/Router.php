<?php

namespace App\router;

final class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function run(string $url)
    {
        foreach ($this->routes as $route) {
            if ($route->matches($url)) {
                $route->callAction();
            }
        }
    }

}