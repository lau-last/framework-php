<?php

namespace App\Controller;

use Core\Controller\Controller;

final class LogController extends Controller
{
    public function showRegistration()
    {
        $this->renderer->render('log.registration');
    }

    public function showConnection()
    {
        $this->renderer->render('log.connection');
    }


}