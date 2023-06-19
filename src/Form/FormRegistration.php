<?php

namespace App\Form;

final class FormRegistration
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

    private function checkName(array $input): bool
    {
        if (isset($input['name']) && strlen($input['name']) > 3) {
            return true;
        }
        return false;
    }

    private function checkPassword(array $input): bool
    {
        if (isset($input['password1']) && isset($input['password2']) && $input['password1'] === $input['password2']) {
            return true;
        }
        return false;
    }

    private function checkEmail(array $input): bool
    {
        if (isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public function isValid(array $input): array
    {
        $errors = [];
        if ($this->checkName($input) === false) {
            $errors['name'] = 'the name must contain at least 3 characters';
        }
        if ($this->checkEmail($input) === false) {
            $errors['email'] = 'the email address is not valid';
        }
        if ($this->checkPassword($input) === false) {
            $errors['password'] = 'passwords do not match';
        }
        return $errors;
    }

}