<?php
use PHPMailer\PHPMailer;

function validate_recapcha($captcha) {
    $secretKey = RECAPCHA_SECRET_KEY;
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . $captcha;
    $response = file_get_contents($url);
    $responseKeys = json_decode($response,true);
    return $responseKeys;
}

function send_mail_custom($reciever_email_value,$reciever_email_name) {
		$mail = new PHPMailer\PHPMailer(true);
		$mail->isSMTP();
		#$mail->SMTPDebug = 2;
		$mail->Host = SMTP_HOST_VALUE;
		$mail->Port = SMTP_PORT_VALUE;
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_USERNAME;
		$mail->Password = EMAIL_PASSWORD;
		$mail->setFrom(EMAIL_SENDER, SITE_SHORT_DESC);

		$reciever = $reciever_email_value;
		$reciever_name = "Reciever";
        $subject = "We got it! - ".FG_TEAM;
        $template_name['name'] = $reciever_email_name;
        //EMAIL_TEMPLATE_NAMES[1];
        //$body = EMAIL_TEMPLATE_NAMES[$template_id]($template_name);
        $body = contact_us_email_template($template_name);
        /*$h = '1';
        $p = json_decode($template_name);
        printValues($template_name);
        echo $template_name;
        echo "##";
        echo $p;
        $x = 'EMAIL_TEMPLATE_NAMES[$template_id]($p)';
        echo $x;
        eval ("\$x = \"$x\";");
        echo $x;
        exit;
        $f = eval($x);
        */

		#$mail->addReplyTo($reciever, $reciever_name);
		$mail->addAddress($reciever, $reciever_name);
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        $mail->Body = $body.EMAIL_FOOTER;
		try {
			if (!$mail->send()) {
                return 0;
            } else {
                echo "sent";
				return 1;
			}
		} catch (Exception $e) {
			return 0;
		}
}


/* Email Templates*/
//contact us email template
function contact_us_email_template($data) {
return '<table>
<tr>
<td align="left" valign="top" colspan="2" style="padding: 20px 0 10px 0;">
<span style="font-size: 18px; font-weight: normal;">CONTACT US</span>
</td>
</tr>
<tr>
<td align="left" valign="top" colspan="2" style="padding-top: 10px;">
Hi '.$data['name'].',

Thanks so much for reaching out! This auto-reply is just to let you know…

We received your email and will get back to you with a (human) response as soon as possible. During [business_hours] that’s usually within a couple of hours. Evenings and weekends may take us a little bit longer.

If you have general questions about your travel or stay, check out our here for walkthroughs and answers to FAQs.

If you have any additional information that you think will help us to assist you, please feel free to reply to this email.

We look forward to chatting soon!

</td>
</tr>
</table>';
}

function generate_pnr(){
    $digits_needed=8;
    $random_number=''; // set up a blank string
    $count=0;
    while ( $count < $digits_needed ) {
        $random_digit = mt_rand(1, 9);
        $random_number .= $random_digit;
        $count++;
    }
    return $random_number;
}