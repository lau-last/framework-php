<?php

namespace Core\Controller;

use Core\Renderer\Renderer;

abstract class Controller
{
    protected ?Renderer $renderer = null;

    public function __construct()
    {
        if (is_null($this->renderer)) {
            $this->renderer = new Renderer();
        }
    }
}