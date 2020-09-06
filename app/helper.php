<?php
date_default_timezone_set("Asia/Kolkata");
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

function send_mail_custom($reciever_email_value,$reciever_email_name,$template_name,$extra_details) {
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
		$reciever_name = $reciever_email_name;
		#template_data['name'] = $reciever_email_name;
		$body = "";
		$subject = "";
		switch ($template_name) {
		case CONTACTUS_EMAIL_TEMPLATE:
			$subject = CONTACT_US_CUSTOMER_SUBJECT.' '.SITE_SHORT_DESC;
			$body = contact_us_email_template($extra_details);
			#$mail->addReplyTo($reciever, $reciever_name);
			$mail->addAddress($reciever, $reciever_name);
			break;
		case CONTACTUS_UPDATE_EMAIL_TEMPLATE_ADMIN:
			$subject = CONTACT_US_ADMIN_SUBJECT.' - '.$reciever_name;
			$body = contact_us_admin_email_template($extra_details);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			$mail->addAddress($reciever, $reciever_name);
			break;
		case BOOKINGS_EMAIL_TEMPLATE:
			$subject = BOOKINGS_CUSTOMER_SUBJECT.' - '.$reciever_name;
			$body = user_booking_email_template($extra_details);
			$mail->addAddress($reciever, $reciever_name);
			break;
        case BOOKINGS_EMAIL_TEMPLATE_ADMIN:
			$subject = BOOKINGS_ADMIN_SUBJECT.' - '.$reciever_name;
            $body = user_booking_admin_email_template($extra_details);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			$mail->addAddress($reciever, $reciever_name);
			break;
		case CONTACT_US_REPLY:
			$subject = BOOKINGS_ADMIN_SUBJECT.' '.SITE_SHORT_DESC;
            $body = admin_reply_to_enquiry_template($extra_details);
			$mail->addAddress($reciever, $reciever_name);
			break;
		break;
		default:
			return 0;
		}
		$mail->Subject = $subject;
		$mail->IsHTML(true);
		$mail->Body = EMAIL_HEADER.$body.EMAIL_FOOTER;
		try {
			if (!$mail->send()) {
				return 0;
			} else {
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
 This auto-reply is just to let you know that we have received your email and will get back to you soon.
</td>
</tr>
<tr colspan="2">
<td>
</td>
</tr>
</table>';
}

function generate_pnr(){
	$digits_needed=4;
	$random_number=''; // set up a blank string
	$random_number_two='';
	$count=0;
	while ( $count < $digits_needed ) {
		$random_digit = mt_rand(1, 9);
		$random_number .= $random_digit;
		$random_digit_two = mt_rand(1, 9);
		$random_number_two .= $random_digit_two;
		$count++;
	}
	return $random_number.$random_number_two;
}


//contact us admin template
function contact_us_admin_email_template($data) {
	if($data['phone'] == "") {
		$phone_details = "Unfortunately we do not have the contact number details.";
	} else {
		$phone_details = "We also have the contact number. You can call on <b><a href='tel:".$data['phone']."'>".$data['phone']."</b>";
	}
	return '<table>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding: 20px 0 10px 0;">
	<span style="font-size: 18px; font-weight: normal;">CONTACT US</span>
	</td>
	</tr>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding-top: 10px;">
	Hello there!
	<td>
	</tr>
	<tr>
	<td colspan="2">
	We have a person who just contacted us. This is what '.$data['name'].' has to say:
	 </td>
	</tr>
	<tr colspan="2">
	<td colspan="2" style="background-color:beige;">
		'.$data['message'].'
	</td>
	</tr>
	<tr colspan="2">
	<td>
	<br>
	 We also have the email of '.$data['name'].' so you can contact them back. Here is the email address <b>'.$data['email'].'</b>
	 </td>
	 </tr>
	 <tr colspan="2">
		<td>
		<br>
		'.$phone_details.'
		</td>
	</tr>
	</table>';
}


//bookings user email template
function user_booking_email_template($data) {
	return '<table>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding: 20px 0 10px 0;">
	<span style="font-size: 18px; font-weight: normal;">BOOKINGS</span>
	</td>
	</tr>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding-top: 10px;">
	Hi '.$data['name'].',
	<td>
	</tr>
	<tr>
	<td colspan="2">
	<br>
	Thank you for showing interest. We are happy to serve you.</td>
	</tr>
	<tr colspan="2">
	<td colspan="2">
	<br>
	We have recieved your booking request and will get back to you soon. You PNR number for the booking request you just made is <b>'.$data['pnr'].'</b>. 
	</td>
	</tr>
	<tr colspan="2" >
	<td>
		You can use this PNR number to track the status of your request by visiting the <a target="_blank" href="'.FEELGOA_LINK.'">feelgoatravels.com</a> website and clicking on <a target="_blank" href="'.SITE_URL.BOOKING_STATUS_URL.'">"Booking status enquiry"</a> at the bottom of the page.
	</td>
	</tr>
	<tr colspan="2" >
	<td>
	<br>
		You can also click <a target="_blank" href="'.SITE_URL.BOOKING_STATUS_URL.'">here</a> to track your status now.
	</td>
		</td>
	</tr>
	</table>';
	}

//bookings admin email template
function user_booking_admin_email_template($data) {
	#$formated_date = $data['traveling_date'];
	$formated_date= 'DATE';
	$malecount = $data['malecount'];
	$femalecount = $data['femalecount'];

    $total_count = $malecount + $femalecount;
	return '<table>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding: 20px 0 10px 0;">
	<span style="font-size: 18px; font-weight: normal;">CONTACT US</span>
	</td>
	</tr>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding-top: 10px;">
	Hello there!
	<td>
	</tr>
	<tr>
	<td colspan="2">
	<br>
	There is a booking enquiry made by '.$data['name'].' <i>('.$data['email'].')</i>.
	 </td>
	</tr>
	<tr colspan="2">
	<td>
	<br>
	This customer wants to know if Goa tour booking is possible for these specified details. The total number of members is '.$total_count.'. This consists of '.$malecount.' Male person and '.$femalecount.' Female person.
	 </td>
	 </tr>
	 <tr colspan="2">
		<td>
		<br>
		Prefered pickup point is choosen as '.$data['pickup_loc'].'.
		</td>
	</tr>
	<tr colspan="2" >
	<td>
<br>
Please login into the site and update the Booking status so the customer can check it. Reference PNR number is '.$data['pnr'].'
	</td>
	</table>';
}

function productImage($path){
	return ($path) && file_exists($path)? asset($path) : asset('assets/images/not-found.jpg');
}

function encrypt_code($simple_string) {
	$ciphering = "AES-128-CTR"; 

	$simple_string = "feelGoaId+".$simple_string;

	// Use OpenSSl Encryption method 
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 

	// Non-NULL Initialization Vector for encryption 
	$encryption_iv = IV_ENCRYPTION_VALUE; 

	// Store the encryption key 
	$encryption_key = ENCRYPTION_KEY; 

	// Use openssl_encrypt() function to encrypt the data 
	$encryption = openssl_encrypt($simple_string, $ciphering, 
				$encryption_key, $options, $encryption_iv); 

	// Display the encrypted string 
	return $encryption;
}

function decrypt_code($simple_string) {

	$ciphering = "AES-128-CTR"; 
	$options = 0; 

	// Non-NULL Initialization Vector for decryption 
	$decryption_iv = IV_ENCRYPTION_VALUE; 
	
	// Store the decryption key 
	$decryption_key = ENCRYPTION_KEY; 
	
	// Use openssl_decrypt() function to decrypt the data 
	$decryption=openssl_decrypt ($simple_string, $ciphering,  
			$decryption_key, $options, $decryption_iv); 
	
	// Display the decrypted string 
	$splitvalue = explode("+", $decryption);
	if (isset($splitvalue[1])) {
		return $splitvalue[1];
	} else {
		return 0;
	}
}

function admin_reply_to_enquiry_template($data) {

	return '<table>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding: 20px 0 10px 0;">
	<span style="font-size: 18px; font-weight: normal;">ENQUIRY RESPONSE</span>
	</td>
	</tr>
	<tr>
	<td align="left" valign="top" colspan="2" style="padding-top: 10px;">
	Hi '.$data['firstname'].',
	<td>
	</tr>
	<tr>
	<td colspan="2">
	<br>
	Here is what you had asked us</td>
	</tr>
	<tr colspan="2">
	<td colspan="2" style="background-color:beige;">
	'.$data['prev_message'].'
	</td>
	</tr>

	<tr>
	<td colspan="2">
	<br>
	Below is a reply from the feelgoa team to your above enquiry.</td>
	</tr>
	<tr colspan="2">
	<td colspan="2" style="background-color:beige;">
'.$data['message'].'
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<br>
	Please click <a href="'.SITE_URL.CONTACTUS_URL.'/'.encrypt_code($data['link_value']).'">here</a> to reply to the email and continue the conversation tree.</td>
	</tr>
	</table>';
}