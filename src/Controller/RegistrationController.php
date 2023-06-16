<?php

namespace App\Controller;

use Core\Controller\Controller;

final class RegistrationController extends Controller
{
    public function showRegistration()
    {
        $this->renderer->render('log.registration');
    }

}