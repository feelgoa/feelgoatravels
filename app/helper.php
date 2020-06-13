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
        $subject = FIRST_EMAIL_SUBJECT.' '.SITE_SHORT_DESC;
        $template_name['name'] = $reciever_email_name;  
        $body = contact_us_email_template($template_name);
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
<td>
</tr>
<tr>
<td colspan="2">
Thank you for reaching out to us.
</td>
</tr>
<tr colspan="2">
<td>
This auto-reply is just to let you know that we have received your email and will get back to you with a response as soon as possible. We usually reply within a couple of hours.
</td>
</tr>
<tr colspan="2">
<td>
If you have general questions about your travel or stay, check out our here for walkthroughs and answers to FAQs.
</td>
</tr>
<tr colspan="2">
<td>
We look forward to chatting soon!
</td>
</tr>
</table>';
}