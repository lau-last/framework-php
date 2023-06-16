<?php

namespace App\Controller;

use App\Form\FormRegistration;
use Core\Controller\Controller;
use Core\Http\Request;

final class RegistrationController extends Controller
{
    public function showRegistration()
    {
        $request = new Request();
        $registration = new FormRegistration();

        if ($request->getMethod() == "GET") {
            $this->renderer->render('registration');
        }
        if ($request->getMethod() == "POST" && $registration->isValid($_POST)) {
           dump($_POST);
        }
    }

}