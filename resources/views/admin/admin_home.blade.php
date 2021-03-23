@extends('layouts.admin')

<?php
/*
image.php
*/

header('Content-type: image/jpeg');

// Create Image From Existing File
$jpg_image = imagecreatefromjpeg('http://127.0.0.1/assets/images/bill.jpg');

// Allocate A Color For The Text
$white = imagecolorallocate($jpg_image, 94, 93, 91);
$red = imagecolorallocate($jpg_image, 255, 71, 71);
// Set Path to Font File
$font_path = 'C:/Users/alist/Downloads/feelgoatravels/public/assets/images/fonts/Ubuntu/Ubuntu-Bold.ttf';

// Set Text to Be Printed On Image
$textdate = "22-11-2020";
$texttourdate = "27-11-2020";
$textname = "Alisther Barreto";
$textreptime = "08:45 AM";
$textdeptime = "09:00 AM";
$texttotseats = "1";
$textrupees = "250/-";
$textboardingplace = "Colva";
$signature = "feelgoatravels";
$ticketno = "A0003";
$pnonumber_valur = "210215";

// Print Text On Image
imagettftext($jpg_image, 60, 0, 500, 1320, $white, $font_path, $textdate);
imagettftext($jpg_image, 60, 0, 1700, 1320, $white, $font_path, $texttourdate);
imagettftext($jpg_image, 60, 0, 520, 1520, $white, $font_path, $textname);
imagettftext($jpg_image, 60, 0, 700, 1720, $white, $font_path, $textreptime);
imagettftext($jpg_image, 60, 0, 1700, 1720, $white, $font_path, $textdeptime);
imagettftext($jpg_image, 60, 0, 730, 1930, $white, $font_path, $texttotseats);
imagettftext($jpg_image, 60, 0, 1700, 1930, $white, $font_path, $textrupees);
imagettftext($jpg_image, 60, 0, 880, 2150, $white, $font_path, $textboardingplace);

imagettftext($jpg_image, 60, 0, 1800, 730, $red, $font_path, $ticketno);
// Send Image to Browser
imagejpeg($jpg_image,'C:\xampp\htdocs\feelgoatravels\public\assets\bills\Ticket_'.$ticketno.'_pno_'.$pnonumber_valur.'.jpg');

// Clear Memory
imagedestroy($jpg_image);

?>

@section('content')
<section>
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="metismenu-icon pe-7s-graph2"></i>
				</div>
				<div>{{ ADMIN_DASHBOARD_TITLE }}
					<div class="page-title-subheading">Complete overview of yout website is available here.</div>
				</div>
			</div>
			<div class="page-title-actions" style="display:none;"></div>
		</div>
	</div>

	<!-- Content -->
	<div class="row">
		<div class="col-md-12">
			<p>
			
			</p>
		</div>
	</div>
	<div class="row">
	</div>
@endsection