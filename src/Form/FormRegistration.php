<?php

namespace App\Form;

use Core\QueryBuilder\Insert;
use Core\QueryBuilder\Manager;

class FormRegistration
{
    public function formRegistration(): string
    {
        $form = (new \Core\FormBuilder\Form(['action' => '/registration', 'method' => 'post']));
        $formRegistration = $form->start();
        $formRegistration .= (new \Core\FormBuilder\Label('Name', ['for' => 'name', 'class' => 'form-label']));
        $formRegistration .= (new \Core\FormBuilder\Input('name', 'text', ['id' => 'name', 'class' => "form-control mb-3"]))->required();
        $formRegistration .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $formRegistration .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $formRegistration .= (new \Core\FormBuilder\Label('Password', ['for' => 'password1', 'class' => 'form-label']));
        $formRegistration .= (new \Core\FormBuilder\Input('password1', 'password', ['id' => 'password1', 'class' => "form-control mb-3"]))->required();
        $formRegistration .= (new \Core\FormBuilder\Label('Password', ['for' => 'password2', 'class' => 'form-label']));
        $formRegistration .= (new \Core\FormBuilder\Input('password2', 'password', ['id' => 'password2', 'class' => "form-control mb-3"]))->required();
        $formRegistration .= '<div class="d-flex justify-content-center">';
        $formRegistration .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $formRegistration .= '</div>';
        $formRegistration .= $form->end();
        return $formRegistration;
    }

    public function checkPassword(array $input): bool
    {
        if (isset($input['password1']) !== isset($input['password2'])) {
            return false;
        }
        return true;
    }

//    public function checkEmail(array $input):bool
//    {
//         if(isset($input['email']) && );
//    }

    public function isValid($input)
    {

    }

}