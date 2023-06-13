<?php

namespace Core\Router;

use Core\Http\Request;

final class Router
{
    /**
     * @var array<Route>
     */
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function match(Request $request): ?Route
    {
//        dd($request);
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route;
            }
        }
        return null;
    }
}