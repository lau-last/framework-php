<?php

namespace Core\Renderer;

final class Renderer
{
    public function render(string $view): string
    {
        $path =  dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . $view . '.php';
        ob_start();
        include $path;
        return ob_get_clean();
    }
}