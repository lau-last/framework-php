<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Manager\EmailManager;
use App\Manager\FormManager\FormChangePassword;
use App\Manager\FormManager\FormConnection;
use App\Manager\FormManager\FormContact;
use App\Manager\FormManager\FormRegistration;
use App\Manager\UserManager;
use App\SessionBlog\SessionBlog;
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
        if (!$form->registerSession($request->getPost())) {
            $errors[] = 'The login or password is incorrect';
            $this->renderer->render('connection', compact('errors'));
            exit();
        }
        header('Location:/');
    }

    public function logout()
    {
        (new SessionBlog())->destroy();
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
        if (!empty($errors)) {
            $this->renderer->render('registration', compact('errors'));
            exit();
        }
        (new UserManager())->UserPreRegistration($request->getPost());
        if (!(new EmailManager())->doSendEmailValidation($request->getPost())) {
            $messages = 'Message could not be sent for validation retry please';
        } else {
            $messages = 'Message has been sent for validation';
        }
        $this->renderer->render('registration', compact('messages'));
    }

    public function showFormCreationArticle()
    {
        UserManager::userIsAdmin() ?
            $this->renderer->render('creation-article') :
            header('Location: /403');
    }

    public function showFormModifyArticle($id)
    {
        $article = (new ArticleManager())->getArticle($id);
        $this->renderer->render('modify-article', \compact('article'));
    }

    public function sendEmail()
    {
        $request = new Request();
        if (!(new EmailManager())->doSendEmailContact($request->getPost())) {
            $messages = 'Message could not be sent';
        } else {
            $messages = 'Message has been sent';
        }
        $this->renderer->render('home', compact('messages'));
    }


}