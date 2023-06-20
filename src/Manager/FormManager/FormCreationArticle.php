<?php

namespace App\Manager\FormManager;

final class FormCreationArticle
{
    public function formCreationArticle(): string
    {
        $form = new \Core\FormBuilder\Form(['action' => '/do-article-creation', 'method' => 'post']);
        $formConnection = $form->start();
        $formConnection .= (new \Core\FormBuilder\Label('Your title', ['for' => 'title', 'class' => 'form-label']));
        $formConnection .= (new \Core\FormBuilder\Input('title', 'text', ['id' => 'title', 'class' => "form-control mb-3"]))->required();
        $formConnection .= (new \Core\FormBuilder\Label('Your head', ['for' => 'head', 'class' => 'form-label']));
        $formConnection .= (new \Core\FormBuilder\Input('head', 'text', ['id' => 'head', 'class' => "form-control mb-3"]))->required();
        $formConnection .= (new \Core\FormBuilder\Label('Your content', ['for' => 'content', 'class' => 'form-label']));
        $formConnection .= (new \Core\FormBuilder\Textarea('content', ['id' => 'content', 'class' => 'form-control mb-3']))->required();
        $formConnection .= '<div class="d-flex justify-content-center">';
        $formConnection .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $formConnection .= ' </div>';
        $formConnection .= $form->end();
        return $formConnection;
    }
}