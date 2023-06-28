<?php

namespace App\Manager\FormManager;

final class FormChangePassword
{
    public function formChangePassword(): string
    {
        $html = (new \Core\FormBuilder\Label('New password', ['for' => 'password1', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('password1', 'password', ['id' => 'password1', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Verify new password', ['for' => 'password2', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('password2', 'password', ['id' => 'password2', 'class' => "form-control mb-3"]))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        return $html;
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

    public function isValid(array $input): array
    {
        $errors = [];
        if ($this->checkPassword($input) === false) {
            $errors['password'] = 'Passwords do not match';
        }
        if ($this->validPassword($input) === false) {
            $errors['regex'] = 'Your password must contain at least 8 characters, one uppercase, one lowercase and one special character';
        }
        return $errors;
    }
}