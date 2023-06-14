<?php

namespace Core\Controller;

abstract class Controller
{
    protected string $viewPath;
    protected string $template;

    protected function render(string $view, ?array $data = [])
    {
        \ob_start();
        \extract($data);
        require $this->viewPath . \str_replace('.', '/', $view) . '.php';
        $content = \ob_get_clean();
        require $this->viewPath . $this->template . '.php';
    }
}