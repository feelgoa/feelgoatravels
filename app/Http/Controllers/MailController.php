<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\PHPMailer;
//require 'vendor/autoload.php';

class MailController extends Controller {

	public function basic_email() {
        $mail = new PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.in';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'support@feelgoatravels.com';
        $mail->Password = 'F33lG0aTravel$';
        $mail->setFrom('support@feelgoatravels.com', 'Eliston Gomes');
        $mail->addReplyTo('support@feelgoatravels.com', 'Customer');
        $mail->addAddress('support@feelgoatravels.com', 'Receiver Name');
        $mail->Subject = 'Testing PHPMailer';
        $mail->Body = 'This is a plain text message body';
        //$mail->addAttachment('test.txt');
        try {
            $mail->send();
            /*if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'The email message was sent.';
            }*/
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function send_mail() {
        echo "SUCCESS";
    }
}
