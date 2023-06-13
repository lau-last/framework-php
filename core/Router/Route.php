<?php

namespace Core\Router;

use Core\Http\Request;

final class Route
{
    private string $path;
    private array $methods;
    public array $params = [];
    private string $controllerName;
    private string $action;


    public function __construct(string $path, string $controllerName, string $action, array $methods = ['GET'])
    {
        $this->path = $path;
        $this->controllerName = $controllerName;
        $this->action = $action;
        $this->methods = $methods;
    }

    public function match(Request $request): bool
    {
        $matches = [];
        if (preg_match('#^' . $this->path . '$#sD', $request->getUri(), $matches)) {
            if (count($matches) > 1) {
                array_shift($matches);
                $this->params = $matches;
            }
            return true;
        }
        return false;
    }

    public function callAction(): void
    {
        $controller = new $this->controllerName;
        $action = $this->action;
        $controller->$action($this->params);
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }
}