<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PMail {

    public function __construct() {
        /* if($this->session->userdata('is_logged_in') ==1){
          redirect('form','refresh');
          } */
    }

    public function sendMail($params) {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'lab.gomein@gmail.com';                 // SMTP username
            $mail->Password = 'gomelab26';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom($params['from_email'], $params['from_name']);
            $mail->addAddress($params['to']);               // Name is optional
            //$mail->addReplyTo('lab.gomein@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $params['subject'];
            $mail->Body = $params['message'];
            $mail->AltBody = $params['message'];

            $mail->send();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

}
