<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Manager\FormManager\FormConnection;
use App\Manager\FormManager\FormContact;
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

    public function doRegistration(): void
    {
        $request = new Request();
        $registration = new FormRegistration();
        $errors = $registration->isValid($request->getPost());
        if (empty($errors)) {
            (new UserManager())->UserRegistration($request->getPost());
            header('Location:/');
        }
        $this->renderer->render('registration', compact('errors'));
    }

    public function showFormCreationArticle()
    {
        $this->renderer->render('creation-article');
    }

    public function showFormModifyArticle($id)
    {
        $article = (new ArticleManager())->getArticle($id);
        $this->renderer->render('modify-article', \compact('article'));
    }

    public function sendEmail()
    {
        $request = new Request();
        (new FormContact())->doSendEmail($request->getPost());
        dump($_POST);
    }

}