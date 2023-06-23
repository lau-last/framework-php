<?php

namespace App\Manager\FormManager;


final class FormContact
{
    public function FormContact(): string
    {
        $form = new \Core\FormBuilder\Form(['action' => '/do-contact', 'method' => 'post']);
        $html = $form->start();
        $html .= (new \Core\FormBuilder\Label('Email address', ['for' => 'email', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('email', 'email', ['id' => 'email', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('subject', ['for' => 'subject', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Input('subject', 'text', ['id' => 'subject', 'class' => "form-control mb-3"]))->required();
        $html .= (new \Core\FormBuilder\Label('Your message', ['for' => 'message', 'class' => 'form-label']));
        $html .= (new \Core\FormBuilder\Textarea('message', ['id' => 'message', 'class' => 'form-control mb-3']))->required();
        $html .= '<div class="d-flex justify-content-center">';
        $html .= new \Core\FormBuilder\Button('Send message', ['type' => 'submit', 'class' => 'btn btn-warning mb-3']);
        $html .= ' </div>';
        $html .= $form->end();
        return $html;
    }

    public function doSendEmail($input)
    {
        $to = $input['email'];
        $subject = $input['subject'];
        $message = $input['message'];
        $headers = array(
            'From' => 'laurent.last7@gmail.com',
            'Reply-To' => 'laurent.last7@gmail.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
    }

}