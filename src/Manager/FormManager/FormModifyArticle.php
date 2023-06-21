<?php

namespace App\Manager\FormManager;

use Core\FormBuilder\Button;
use Core\FormBuilder\Form;
use Core\FormBuilder\Input;
use Core\FormBuilder\Label;
use Core\FormBuilder\Textarea;

final class FormModifyArticle
{
    public function formModifyArticle($title, $head, $content): string
    {

        $html = (new Label('Your title', ['for' => 'title', 'class' => 'form-label']));
        $html .= (new Input('title', 'text', ['id' => 'title', 'class' => "form-control mb-3", 'value' => $title]))->required();
        $html .= (new Label('Your head', ['for' => 'head', 'class' => 'form-label']));
        $html .= (new Input('head', 'text', ['id' => 'head', 'class' => "form-control mb-3", 'value' => $head]))->required();
        $html .= (new Label('Your content', ['for' => 'content', 'class' => 'form-label']));
        $html .= (new Textarea('content', ['id' => 'content', 'class' => 'form-control mb-3'], $content))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        return $html;
    }


}