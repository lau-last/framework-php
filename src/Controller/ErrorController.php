<?php

namespace App\Controller;

use Core\Controller\Controller;

final class ErrorController extends Controller
{
    public function show403()
    {
        $this->renderer->render('403');
    }
}