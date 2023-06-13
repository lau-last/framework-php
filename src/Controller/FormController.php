<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Renderer\Renderer;

final class FormController extends Controller
{
    protected Renderer $render;

    public function __construct()
    {
        parent::__construct();
    }
}