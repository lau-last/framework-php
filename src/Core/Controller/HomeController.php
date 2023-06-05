<?php

namespace App\Core\Controller;

use App\Controller\Controller;

final class HomeController extends Controller
{
    public function showHome()
    {
        echo $this->render->render('base');
    }
}