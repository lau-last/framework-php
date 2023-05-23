<?php

use App\formBuilder\field\Button;
use App\formBuilder\field\Input;
use App\formBuilder\field\Option;
use App\formBuilder\field\Select;
use App\formBuilder\field\Textarea;
use App\formBuilder\Form;

if (Form::isValid()) {
    $form = new Form(['method' => 'POST', 'action' => '/form']);
    $select = new Select(['for' => 'pet']);

    echo $form->start();

    echo new Input(['type' => 'text']);
    echo new Input(['type' => 'text']);
    echo (new Input(['type' => 'text', 'name' => 'user']))
        ->required();
    echo new Textarea();
    echo $select->start();

    echo new Option('Choose', ['value' => '']);
    echo new Option('Chat', ['value' => 'Chat']);
    echo new Option('Chien', ['value' => 'Chien']);
    echo new Option('Oiseau', ['value' => 'Oiseau']);
    echo new Option('Tigre', ['value' => 'Tigre']);

    echo $select->end();
    echo new Button('Envoyer', ['type' => 'submit']);

    echo $form->end();
} else {
    dump(Form::showPost());
}