<?php

namespace App\Controller;

use App\Manager\FormManager\FormConnection;
use App\Manager\FormManager\FormRegistration;
use App\Manager\UserManager;
use Core\Controller\Controller;
use Core\Http\Request;
use Core\Session\Session;

final class FormController extends Controller
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
        header('Location:/');
    }

    public function logout()
    {
        (new Session())->destroy();
        header('Location:/');
    }

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
            header('Location:/');
        }
        return $errors;
    }

    public function showFormCreationArticle()
    {
        $this->renderer->render('creation-article');
    }

}