<?php

namespace App\Manager\FormManager;

final class FormCreationComment
{
    public function formCreationComment(): string
    {
        $html = (new \Core\FormBuilder\Label('Your comment', ['for' => 'comment', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Textarea('comment', ['id' => 'comment', 'class' => 'form-control mb-3']))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Submit', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= '</div>';
        return $html;
    }

}