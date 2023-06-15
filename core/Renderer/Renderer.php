<?php

namespace Core\Renderer;

final class Renderer
{
    public function render(string $view, ?array $data = [])
    {
        \ob_start();
        \extract($data);
        require VIEW_PATH . \str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        $content = \ob_get_clean();
        require VIEW_PATH . TEMPLATE . '.php';
    }
}