<?php

namespace Core\Controller;

use Core\Renderer\Renderer;

abstract class Controller
{
    protected Renderer $render;

    public function __construct()
    {
        $this->render = new Renderer();
    }
}