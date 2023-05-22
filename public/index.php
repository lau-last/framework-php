<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

// (new \App\Router\Router())->run();

$form = (new \App\form\FormBuilder())
    ->addFieldsInput('name', 'Votre nom :', 'text', 'user_name')
    ->addFieldsTextarea('comment', 'Votre commentaire :', 'user_comment')
    ->addFieldsInput('email', 'Votre email :', 'email :', 'user_mail')
    ->addFieldsSelect('pet', 'Choisir animal :', 'pet', [
        '' => 'choisir un animal',
        'chien' => 'Chien',
        'chat' => 'Chat'
    ]);
$form->render();






