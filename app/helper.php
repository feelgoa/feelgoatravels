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
			$subject = PAYMENT_DETAILS_SUBJECT.' '.SITE_SHORT_DESC;
            $body = admin_reply_to_enquiry_template($extra_details);
			$mail->addAddress($reciever, $reciever_name);
			break;
		case BOOKING_PAYMENT_TEMPLATE:
			$subject = BOOKINGS_ADMIN_SUBJECT.' '.SITE_SHORT_DESC;
            $body =  $extra_details;
			$mail->addAddress($reciever, $reciever_name);
			break;
		case CONTACTUS_EMAIL_THREAD:
			$subject = CONTACT_US_ADMIN_SUBJECT.' ('.REFERENCE_ID.' #'.$extra_details['contactusid'].'.) '.SITE_SHORT_DESC;
			$body = contact_us_admin_thread_email_template($extra_details);
			$mail->addAddress(EMAIL_SENDER, FG_TEAM);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			break;
		case BOOKING_VEHICLE:
			$subject = BOOKINGS_CUSTOMER_SUBJECT.'- '.$extra_details['name'].' ('.$extra_details['vehicle_details'][0]->vehicle_name.')';
			$body = booking_recieved($extra_details);
			$mail->addAddress(EMAIL_SENDER, FG_TEAM);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			break;
		case HOTEL_BOOKING:
			$subject = BOOKINGS_CUSTOMER_SUBJECT.'- '.$extra_details['name'].' (Hotel Booking)';
			$body = booking_recieved_hotel_booking($extra_details);
			$mail->addAddress(EMAIL_SENDER, FG_TEAM);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			break;
		case TOUR_BOOKING:
			$subject = BOOKINGS_CUSTOMER_SUBJECT.'- '.$extra_details['name'].' (Tour Booking)';
			$body = booking_recieved_tour_booking($extra_details);
			$mail->addAddress(EMAIL_SENDER, FG_TEAM);
			$mail->addReplyTo($extra_details['email'], $extra_details['name']);
			break;
		default:
			return 0;
		}
		$mail->Subject = $subject;
		$mail->IsHTML(true);
		if (($template_name != CONTACTUS_EMAIL_THREAD) && ($template_name != BOOKING_VEHICLE) && ($template_name != HOTEL_BOOKING) && ($template_name != TOUR_BOOKING)) {
			$mail->Body = EMAIL_HEADER.$body.EMAIL_FOOTER;
		} else {
			$mail->Body = $body;
		}
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
	We have recieved your booking request and will get back to you soon. <p style="display:none;">You PNR number for the booking request you just made is <b>'.$data['pnr'].'</b></p>. 
	</td>
	</tr>
	<tr colspan="2" >
	<td style="display:none;">
		You can use this PNR number to track the status of your request by visiting the <a target="_blank" href="'.FEELGOA_LINK.'">feelgoatravels.com</a> website and clicking on <a target="_blank" href="'.SITE_URL.BOOKING_STATUS_URL.'">"Booking status enquiry"</a> at the bottom of the page.
	</td>
	</tr>
	<tr colspan="2" >
	<td style="display:none;">
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

function payment_email_generator ($details) {
$value = '<table><tr><td>Hi,</td></tr>

<tr><td><br>With regards to your booking payment and confirmation, here are the details.</td></tr>

<tr><td><br>Bookings summary</td></tr>

<tr><td><br>Name : '.$details['name'].'</td></tr>
<tr><td>Number on people traveling : '.$details['count'].'</td></tr>
<tr><td>PNR : '.$details['pnr'].'</td></tr>
<tr><td>Pickup Point : '.$details['pickuppoint'].'</td></tr>

<tr><td><br>Traveling dates</td></tr>
'.$details['days'].'

<tr><td><br>Your total calculated traveling cost is '.$details['calculation'].' = '.$details['amount'].'Rs</td></tr>

<tr><td><br>You can click on the below link to proceed to make the payment.</td></tr>

<tr><td><br><a target="_blank" href="'.SITE_URL.BOOKING_PAYMENTS_URL.'/'.$details['transaction_reference'].'"> Click here to proceed to payments page </a>This link is only valid for 24 hours.</td></tr>

<tr><td><br>
***You can add extra content here. You can remove this line if not required.***
</td></tr>

<tr><td><br>You you have any queries, you can contact us. We will be happy to assist you. Please don\'t forget to mention your PNR number.</td></tr>

<tr><td><br>*Charges for Day1 and Day2 are '.DAY1_DAY2_CHARGE.'Rs per person for each day.</td></tr>
<tr><td>*Charges for Day3 and Day4 are '.DAY3_DAY4_CHARGE.'Rs per person for each day.</td></tr>
<tr><td>**Charges will be applicable as per the selected days.</td></tr></table>';

	return $value;

}


function calculate_travel_details($details,$count) {
	$resp['days'] = "";
	$resp['calc'] = "";
	$resp['amount'] = 0;
	$p_details = json_decode(json_encode($details), true);
	foreach ($p_details as $det) {
		$resp['days'] = $resp['days'] ."<tr><td>Day".$det['day'].": ".date('d/m/Y', strtotime($det['travel_date']))."</td></tr>";
		if (($det['day'] == 1) || ($det['day'] == 2)) {
			$resp['calc'] = $resp['calc'].DAY1_DAY2_CHARGE."RsX".$count." + ";
			$resp['amount'] = $resp['amount'] + $count*DAY1_DAY2_CHARGE;
		} elseif(($det['day'] == 3) || ($det['day'] == 4)) {
			$resp['calc'] = $resp['calc'].DAY3_DAY4_CHARGE."RsX".$count." + ";
			$resp['amount'] = $resp['amount'] + $count*DAY3_DAY4_CHARGE;
		} else {
			$resp['calc'] = $resp['calc']."0RsX ".$count." + ";
			$resp['amount'] = $resp['amount'] + $count*0;
		}
	}
	$resp['calc'] = rtrim($resp['calc'], ' + ') . '';
	return $resp;

}

function contact_us_admin_thread_email_template($details) {
	return '<p>'.$details['message'].'</p>';
}

function booking_recieved($details) {
	/*
		vehicle rental booking (weeding cars, bikes and cars)
	*/
	return '<p>Vehicle Booking Details</p><table style="border: 1px solid black;">
	<tr>
	<td style="text-align:right;">Name : 
	</td>
	<td>'.$details['name'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Message : 
	</td>
	<td>
	'.$details['message'].'</td></tr></table>	<br>
	<table>
	<tr>
	<td>
	Contac No : 
	</td>
	<td>'.$details['contact'].'
	</td>
	</tr>
	</table>';
}

function booking_recieved_hotel_booking($details) {
	/*
		hotel booking
	*/
	$details_resp = '<p>Hotel Booking Details</p>
	<table style="border: 1px solid black;">
	<tr>
	<td style="text-align:right;">Name : 
	</td>
	<td>'.$details['name'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">CheckIn : 
	</td>
	<td>'.$details['check_in_date'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">CheckOut : 
	</td>
	<td>'.$details['check_out_date'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Room type : 
	</td>
	<td>'.$details['room_type'].'
	</td>
	</tr>
	<tr>
	<tr>
	<td style="text-align:right;">Member count : 
	</td>
	<td>'.$details['member_count'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Room count :
	</td>
	<td>'.$details['room_count'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Extra requirements :
	</td>
	<td>'.$details['extra_requirements'].'
	</td>
	</tr>
	</table>
	<br>
	<table>
	<tr>
	<td>
	Contac No : 
	</td>
	<td>'.$details['contact'].'
	</td>
	</tr>
	</table>
	';
	return $details_resp;
}

function booking_recieved_tour_booking($details) {
	$details_resp = '<p>Tour Booking Details</p>
	<table style="border: 1px solid black;">
	<tr>
	<td style="text-align:right;">Name : 
	</td>
	<td>'.$details['name'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Countr/State/Location : 
	</td>
	<td>'.$details['place'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Male count : 
	</td>
	<td>'.$details['male'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Female count : 
	</td>
	<td>'.$details['female'].'
	</td>
	</tr>
	<tr>
	<tr>
	<td style="text-align:right;">Traveling Day1 - North : 
	</td>
	<td>'.$details['travel1'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Traveling Day2 - North :
	</td>
	<td>'.$details['travel2'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Traveling Day3 :
	</td>
	<td>'.$details['travel3'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Traveling Day2 :
	</td>
	<td>'.$details['travel4'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Pickup point :
	</td>
	<td>'.$details['pickup'].'
	</td>
	</tr>
	<tr>
	<td style="text-align:right;">Bus type :
	</td>
	<td>'.$details['bustype'].'
	</td>
	</tr>
	</table>
	<br>
	<table>
	<tr>
	<td>
	Contac No : 
	</td>
	<td>'.$details['contact'].'
	</td>
	</tr>
	</table>
	';
	return $details_resp;
}