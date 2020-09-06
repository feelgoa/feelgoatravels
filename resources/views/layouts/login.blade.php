<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />
	<title>FeelGoa - Tours and Travels | Admin | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<!--
	=========================================================
	* ArchitectUI HTML Theme Dashboard - v1.0.0
	=========================================================
	* Product Page: https://dashboardpack.com
	* Copyright 2019 DashboardPack (https://dashboardpack.com)
	* Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
	=========================================================
	* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	-->
	<link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container row">

	<form name="frm-login" id="frm-login" method="POST" >
	<input type="text" name="email" id="email" placeholder="email">
	<input type="password" name="pswd" id="pswd" placeholder="password">
	<input type="submit" value="Login" id="loginbtn">
	</form>

	<form name="resp_form" id="resp_form" method="POST">
							<div>
								<input type="text" name="email" id="email" placeholder="email">
							</div>
							<div>
							<input type="password" name="pswd" id="pswd" placeholder="password">
							</div>
							<div>
							<button type="button" class="btn btn-info" id="myBtnlogin">Reply</button>
							</div>
						</form>

	</div>
	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('assets/js/main.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('assets/js/custom_admin.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
