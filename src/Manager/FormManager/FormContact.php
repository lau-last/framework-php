<?php

namespace App\Manager\FormManager;


class FormContact
{
    public function FormContact(): string
    {
        $form = new \Core\FormBuilder\Form(['action' => '/do-contact', 'method' => 'post']);
        $html = $form->start();
        $html .= (new \Core\FormBuilder\Label('Name', ['for' => 'name', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('name', 'text', ['id' => 'name', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Your message', ['for' => 'message', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Textarea('message', ['id' => 'message', 'class' => 'form-control mb-3']))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Send message', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        $html .= $form->end();
        return $html;
    }
}