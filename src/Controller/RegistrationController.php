<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Http\Request;

final class RegistrationController extends Controller
{
    public function showRegistration()
    {
        $request = new Request();

        if ($request->getMethod() == "GET") {
            $this->renderer->render('registration');
        }
        if ($request->getMethod() == "POST") {
           dump($_POST);
        }
    }

}