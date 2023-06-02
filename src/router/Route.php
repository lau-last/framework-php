<?php

namespace App\router;

final class Route
{
    private string $path;
    public array $params;
    private string $controllerName;
    private string $action;


    public function __construct(string $path, string $controllerName, string $action)
    {
        $this->path = $path;
        $this->controllerName = $controllerName;
        $this->action = $action;
    }

    public function matches($url): bool
    {
        $matches = [];
        if (preg_match($this->path, $url, $matches)) {
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
        if (!empty($this->params)) {
             $controller->$action($this->params);
             exit();
        }
        $controller->$action();
    }


}