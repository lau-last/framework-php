<?php

namespace App\Manager\FormManager;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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


    public function doSendEmail($input): bool
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '0679771fe93976';
            $mail->Password = '7a8d5128f28b2d';

            //Recipients
            $mail->setFrom(trim($input['email']), 'Mailer');
            $mail->addAddress('laurent.last7@gmail.com');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = trim($input['subject']);
            $mail->Body = trim($input['message']);

            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}