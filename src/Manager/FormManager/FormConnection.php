<?php

namespace App\Manager\FormManager;

use App\Manager\UserManager;
use Core\Session\Session;

final class FormConnection
{
    public function FormConnection(): string
    {
        $form = new \Core\FormBuilder\Form(['action' => '/do-connection', 'method' => 'post']);
        $html = $form->start();
        $html .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Password', ['for' => 'password', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('password', 'password', ['id' => 'password', 'class' => "form-control mb-3"]))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        $html .= $form->end();
        return $html;
    }

    public function registerSession(array $input)
    {
        if (isset($input['email']) && isset($input['password'])) {

            $email = trim($input['email']);
            $password = trim($input['password']);

            $userInfo = (new UserManager())->getUserInfo($email);

            if (password_verify($password, $userInfo->getPassword())) {
                if (password_needs_rehash($userInfo->getPassword(), PASSWORD_BCRYPT)) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $userInfo->setPassword($password);
                }
                $session = new Session();
                $session->set('id', $userInfo->getId());
                $session->set('name', $userInfo->getName());
                $session->set('email', $userInfo->getEmail());
                $session->set('role', $userInfo->getRole());
            }
        }
    }
}