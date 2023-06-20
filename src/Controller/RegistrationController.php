<?php

namespace App\Controller;

use App\Form\FormRegistration;
use App\Manager\UserManager;
use Core\Controller\Controller;
use Core\Http\Request;

final class RegistrationController extends Controller
{
    public function showFormRegistration()
    {
        $this->renderer->render('registration');
    }

    public function doRegistration(): ?array
    {
        $request = new Request();
        $registration = new FormRegistration();
        $errors = $registration->isValid($request->getPost());
        if (empty($errors)) {
            (new UserManager())->UserRegistration($request->getPost());
            $this->renderer->render('home');
        }
        return $errors;
    }

}