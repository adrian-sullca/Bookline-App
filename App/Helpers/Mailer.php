<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer extends PHPMailer
{

    function mailServerSetup()
    {
        //Server settings
        $this->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
        $this->isSMTP(); //Send using SMTP
        $this->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $this->SMTPAuth = true; //Enable SMTP authentication
        $this->Username = 'adrian.infooo@gmail.com'; //SMTP username
        $this->Password = 'crde hnzm jqpg elaz'; //SMTP password
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $this->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    }

    function addRec($user = [])
    {
        $this->setFrom('bookline@gmail.com', 'BookLine');
        $this->addAddress($user['email'], $user['username']);
    }

    function addAttachments($att)
    {
        foreach ($att as $attachment) {
            $this->addAttachment($attachment);
        }
    }

    function addVerifyContent($user = [])
    {
        $this->isHTML(true);
        $this->Subject = 'Verify your email please...';
        $content = "<p>Hi ".$user['username']." </p>";
        $content .= "<p>Click follow button in order to verify your email</p>";
        $content .= "<a style='padding: 4px; background-color: red; color:white; 
        text-decoration-color: unset;' href='http://localhost/user/verify/".$user['username']."/".$user['token']."'>Verify!</a>";
        $this->Body = $content;
    }
}