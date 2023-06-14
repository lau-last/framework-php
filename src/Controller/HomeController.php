<?php

namespace App\Controller;

use Core\Controller\Controller;

final class HomeController extends Controller
{
    protected string $template = 'base';
    protected string $viewPath = ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Html' . DIRECTORY_SEPARATOR;

    public function showHome()
    {
        $this->render('home');
    }

}