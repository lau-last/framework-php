<?php

namespace App\Controller;

use Core\Controller\Controller;

final class HomeController extends Controller
{
    public function showHome()
    {
        echo $this->render->render('base');
    }
}