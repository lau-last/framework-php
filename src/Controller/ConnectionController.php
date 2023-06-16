<?php

namespace App\Controller;

use Core\Controller\Controller;

final class ConnectionController extends Controller
{
    public function showConnection()
    {
        $this->renderer->render('log.connection');
    }
}