<?php

namespace App\Manager\FormManager;

use Core\FormBuilder\Button;
use Core\FormBuilder\Form;
use Core\FormBuilder\Input;
use Core\FormBuilder\Label;
use Core\FormBuilder\Textarea;

final class FormCreationArticle
{
    private Form $form;

    public function __construct()
    {
        $this->form = new \Core\FormBuilder\Form(['action' => '/do-article-creation', 'method' => 'post']);
    }

    public function formCreationArticle(): string
    {
        $html = $this->form->start();
        $html .= (new Label('Your title', ['for' => 'title', 'class' => 'form-label']));
        $html .= (new Input('title', 'text', ['id' => 'title', 'class' => "form-control mb-3"]))->required();
        $html .= (new Label('Your head', ['for' => 'head', 'class' => 'form-label']));
        $html .= (new Input('head', 'text', ['id' => 'head', 'class' => "form-control mb-3"]))->required();
        $html .= (new Label('Your content', ['for' => 'content', 'class' => 'form-label']));
        $html .= (new Textarea('content', ['id' => 'content', 'class' => 'form-control mb-3']))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        $html .= $this->form->end();
        return $html;
    }


}