<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Mail;
use PHPMailer\PHPMailer;

class MailController extends Controller {

	public function send_mail() {
		$mail = new PHPMailer\PHPMailer(true);
		$mail->isSMTP();
		#$mail->SMTPDebug = 2;
		$mail->Host = SMTP_HOST_VALUE;
		$mail->Port = SMTP_PORT_VALUE;
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_USERNAME;
		$mail->Password = EMAIL_PASSWORD;
		$mail->setFrom(EMAIL_SENDER, SITE_SHORT_DESC);

		$reciever = "support@feelgoatravels.com";
		$reciever_name = "Reciever";
		$subject = "Welcome to Feel Goa";
        $body = "
        <style>
  table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
</style>
<table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Job Title</th>
      <th>Twitter</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-column=\"First Name\">James</td>
      <td data-column=\"Last Name\">Matman</td>
      <td data-column=\"Job Title\">Chief Sandwich Eater</td>
      <td data-column=\"Twitter\">@james</td>
    </tr>
    <tr>
      <td data-column=\"First Name\">Andor</td>
      <td data-column=\"Last Name\">Nagy</td>
      <td data-column=\"Job Title\">Designer</td>
      <td data-column=\"Twitter\">@andornagy</td>
    </tr>
    <tr>
      <td data-column=\"First Name\">Tamas</td>
      <td data-column=\"Last Name\">Biro</td>
      <td data-column=\"Job Title\">Game Tester</td>
      <td data-column=\"Twitter\">@tamas</td>
    </tr>
    <tr>
      <td data-column=\"First Name\">Zoli</td>
      <td data-column=\"Last Name\">Mastah</td>
      <td data-column=\"Job Title\">Developer</td>
      <td data-column=\"Twitter\">@zoli</td>
    </tr>
    <tr>
      <td data-column=\"First Name\">Szabi</td>
      <td data-column=\"Last Name\">Nagy</td>
      <td data-column=\"Job Title\">Chief Sandwich Eater</td>
      <td data-column=\"Twitter\">@szabi</td>
    </tr>
  </tbody>
</table>
        ";

		#$mail->addReplyTo($reciever, $reciever_name);
		$mail->addAddress($reciever, $reciever_name);
        $mail->Subject = $subject;
        $mail->IsHTML(true);
		$mail->Body = $body.EMAIL_FOOTER;

		try {
			if (!$mail->send()) {
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				return response()->json(['isSuccess'=> false, 'message'=> 'Message Could not be sent', 'error'=> $mail->ErrorInfo, 'data'=> '']);
			} else {
				return response()->json(['isSuccess'=> true, 'message'=> 'Message Sent Successfully','data'=> '']);
			}
		} catch (Exception $e) {
			return response()->json(['isSuccess'=> false, 'message'=> 'Message Could not be sent','error'=> $e, 'data'=> '']);
		}
	}

}