<?php

use App\formBuilder\field\Button;
use App\formBuilder\field\Input;
use App\formBuilder\Form;


if(Form::postIsEmpty()) {
    $form = new Form(['method' => 'POST', 'action' => '/form']);
    echo $form->start();
    echo (new Input('user_name'))
        ->required();
    echo new Button('Envoyer', ['type' => 'submit']);
    echo $form->end();
} else{
   $post = Form::showPost();
   dump($post);
}
