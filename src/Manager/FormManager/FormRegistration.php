<?php

namespace App\Manager\FormManager;

final class FormRegistration
{
    public function formRegistration(): string
    {
        $form = (new \Core\FormBuilder\Form(['action' => '/do-registration', 'method' => 'post']));
        $html = $form->start();
        $html .= (new \Core\FormBuilder\Label('Name', ['for' => 'name', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('name', 'text', ['id' => 'name', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Password', ['for' => 'password1', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('password1', 'password', ['id' => 'password1', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Verify password', ['for' => 'password2', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('password2', 'password', ['id' => 'password2', 'class' => "form-control mb-3"]))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= '</div>';
        $html .= $form->end();
        return $html;
    }

    private function checkName(array $input): bool
    {
        return (isset($input['name']) && strlen($input['name']) > 2);
    }

    public function checkPassword(array $input): bool
    {
         return (isset($input['password1']) && isset($input['password2']) && $input['password1'] === $input['password2']);
    }

    public function validPassword($input): bool
    {
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        return preg_match($regex, $input['password1']);
    }

    private function checkEmail(array $input): bool
    {
        return (isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL));
    }


    public function isValid(array $input): array
    {
        $errors = [];
        if ($this->checkName($input) === false) {
            $errors['name'] = 'The name must contain at least 3 characters';
        }
        if ($this->checkEmail($input) === false) {
            $errors['email'] = 'The email address is not valid';
        }
        if ($this->checkPassword($input) === false) {
            $errors['password'] = 'Passwords do not match';
        }
        if ($this->validPassword($input) === false) {
            $errors['regex'] = 'Your password must contain at least 8 characters, one uppercase, one lowercase and one special character';
        }
        return $errors;
    }
}