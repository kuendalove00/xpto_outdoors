<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'email/PHPMailer/src/Exception.php';
require 'email/PHPMailer/src/PHPMailer.php';
require 'email/PHPMailer/src/SMTP.php';

class EmailService
{
   private static $mail = NULL;
    
    public static function emailInstance($endereco) {
        if (!isset(self::$mail)) {
            self::$mail = new PHPMailer();
            self::$mail->isSMTP();
            self::$mail->Host = 'smtp.gmail.com';
            self::$mail->Port = 465;
            self::$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            self::$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            self::$mail->SMTPAuth = true;
            self::$mail->CharSet = PHPMailer::CHARSET_UTF8;
            //Username to use for SMTP authentication - use full email address for gmail
            self::$mail->Username = '20201219@isptec.co.ao';
            //Password to use for SMTP authentication
            self::$mail->Password = 'Angola1234';
            
            self::$mail->setFrom('20201219@isptec.co.ao', 'Kuenda Mayeye'/*(empty('Kuenda') ? 'Contact form' : $name)*/);
            self::$mail->addAddress($endereco);
            self::$mail->addReplyTo('20201219@isptec.co.ao', 'Kuenda Mayeye');
            self::$mail->Subject = 'Criação de Conta '; //$subject;
            self::$mail->Body = "Contact form submission\n\n"; //. $query;

            //send the message, check for errors
            if (!self::$mail->send()) {
                echo 'Mailer Error: ' . self::$mail->ErrorInfo;
            } else {
                echo 'Message sent!';
            }
        }
    }


        
}
        