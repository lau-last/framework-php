<?php

namespace App\Form;

use App\Model\UserModel;
use Core\Session\Session;

final class FormConnection
{
    public function FormConnection(): string
    {
        $form = new \Core\FormBuilder\Form(['action' => '/connection', 'method' => 'post']);
        $formConnection = $form->start();
        $formConnection .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $formConnection .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $formConnection .= (new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label']));
        $formConnection .= (new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"]))->required();
        $formConnection .= '<div class="d-flex justify-content-center">';
        $formConnection .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $formConnection .= ' </div>';
        $formConnection .= $form->end();
        return $formConnection;
    }

    public function registerSession(array $input)
    {
        if (isset($input['email']) && isset($input['password'])) {

            $email = trim($input['email']);
            $password = trim($input['password']);

            $userInfo = (new UserModel())->getUserInfo($email);

            if (md5($password) == $userInfo->getPassword()) {
                $session = new Session();
                $session->set('id', $userInfo->getId());
                $session->set('name', $userInfo->getName());
                $session->set('email', $userInfo->getEmail());
                $session->set('role', $userInfo->getRole());
            }
        }
    }

}