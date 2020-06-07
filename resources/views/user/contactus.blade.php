@extends('layouts.app')

@section('content')
<section id="" class="slider col-md-12 col-sm-12">
	<div class="row">
		<div class="col-md-6 col-sm-6">
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
			<p>Contact Us</p>
			<form name="contact-us-form" id="contact-us-form" method="post">
				<div>
					<div>
						<div>
							<p>First Name
							</p>
						</div>
						<div>
							<input type="text" name="firstname" id="firstname">
						</div>
					</div>
					<div>
						<div>
							<p>Last Name
							</p>
						</div>
						<div>
							<input type="text" name="lastname" id="lastname">
						</div>
					</div>
					<div>
						<div>
							<p>Email
							</p>
						</div>
						<div>
							<input type="text" name="email" id="email">
						</div>
					</div>
					<div>
						<div>
							<p>Phone
							</p>
						</div>
						<div>
							<input type="text" name="phone" id="phone">
						</div>
					</div>
					<div>
						<div>
							<p>Message
							</p>
						</div>
						<div>
							<textarea id="message" name="message"></textarea>
						</div>
					</div>
					<div>
						<div class="g-recaptcha" data-sitekey="{{ RECAPCHA_SITE_KEY }}"></div>
					</div>
					<div>
					<input type="button" id="contact_us_submit" name="submit" value="SUBMIT">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection