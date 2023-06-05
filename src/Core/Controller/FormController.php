<?php

namespace App\Core\Controller;

use App\Controller\Controller;
use App\Renderer\Renderer;

final class FormController extends Controller
{
    protected Renderer $render;

    public function __construct()
    {
        parent::__construct();
    }
}