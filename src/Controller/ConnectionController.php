<?php

namespace App\Controller;

use App\Form\FormConnection;
use Core\Controller\Controller;
use Core\Http\Request;

final class ConnectionController extends Controller
{
    public function showFormConnection()
    {
        $this->renderer->render('connection');
    }

    public function doConnection()
    {
        $form = new FormConnection();
        $request = new Request();
        $form->registerSession($request->getPost());
        $this->renderer->render('home');
    }
}