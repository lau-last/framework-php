<?php

namespace App\Controller;

use App\Renderer\Renderer;

abstract class Controller
{
    protected Renderer $render;

    public function __construct()
    {
        $this->render = new Renderer();
    }
}