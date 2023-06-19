<?php

namespace App\Controller;

use App\Form\FormConnection;
use Core\Controller\Controller;
use Core\Http\Request;

final class ConnectionController extends Controller
{
    public function showConnection()
    {
        $request = new Request();
        $form = new FormConnection();

        if($request->getMethod() == 'GET'){
            $this->renderer->render('connection');
        }
        if ($request->getMethod() == 'POST'){
            $form->registerSession($request->getPost());
            $this->renderer->render('connection');
        }
    }
}