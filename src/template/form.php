<?php

use App\form\FormBuilder;

$form = (new FormBuilder())
    ->addFieldsInput('name', 'Votre nom :', 'text', 'user_name')
    ->addFieldsTextarea('comment', 'Votre commentaire :', 'user_comment')
    ->addFieldsInput('email', 'Votre email :', 'email :', 'user_mail')
    ->addFieldsSelect('pet', 'Choisir animal :', 'pet', [
        '' => 'choisir un animal',
        'chien' => 'Chien',
        'chat' => 'Chat'
    ]);
$form->render();