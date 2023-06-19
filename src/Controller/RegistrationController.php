<?php

namespace App\Controller;

use App\Form\FormRegistration;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Http\Request;

final class RegistrationController extends Controller
{
    public function showRegistration(): ?array
    {
        $request = new Request();
        $registration = new FormRegistration();

        if ($request->getMethod() == "GET") {
            $this->renderer->render('registration');
        }
        if ($request->getMethod() == "POST") {
            $errors = $registration->isValid($_POST);

            if (empty($errors)) {
                (new UserModel())->UserRegistration($_POST);
                $this->renderer->render('home');
            } else {
                dump($errors);
            }
        }
        return null;
    }

}