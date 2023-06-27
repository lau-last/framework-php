<?php

namespace App\Manager;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

final class EmailManager
{
    public function doSendEmailContact($input): bool
    {

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '8c82e295d8ec59';
            $mail->Password = 'c83be3cf5791d7';
            //Recipients
            $mail->setFrom(trim($input['email']), 'Mailer');
            $mail->addAddress('laurent@gmail.com');     //Add a recipient
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

    public function doSendEmailValidation($input): bool
    {
        $userInfo = (new UserManager())->getUserInfo($input['email']);
        $message = '<a href="http://localhost:8888/confirm-registration/' .  $userInfo->getToken() . '" target="_blank">Validate your account by clicking on this link.</a>';
        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '8c82e295d8ec59';
            $mail->Password = 'c83be3cf5791d7';
            //Recipients
            $mail->setFrom('No-Reply@exemple.com', 'Mailer');
            $mail->addAddress(trim($input['email']));     //Add a recipient
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'validation';
            $mail->Body = $message;
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}