@extends('user.include.app')
@section('content')
<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="verification-cover confirm-text-cover">
				
				<h2>Your Data Is Safe With Us </h2>
				<div class="con-top">
					<h3>Dear {{ (session()->has('user_detail'))?Session::get('user_detail')['name']:"" }} </h3>
					<p>Please grant us following permissions to access your eligibility, customise offers and provide faster loan disbursal.</p>
				</div>
				<div class="confirm-text-wrapper">
					<div class="inner-sec">
						<!--<h3>Location</h3>-->
						<!--<p>Collect and monitor geographical information to check loan serviceability, reduce risk of fraud and provide customized offers.</p>-->
						<!--<h3>Contacts</h3>-->
						<!--<p>Collect and monitor contacts and account information for reference checks and to auto-fill information during loan application.</p>-->
						<!--<h3>SMS</h3>-->
						<!--<p>Access and monitor your SMS to  autofill and help to  reduce risk of frauds associated with your loan application along with customised offers.</p>-->
						<!--<h3>Phone</h3>-->
						<!--<p>Collect and monitor device information including your hardware along with user profile, wi-fi information and mobile network to uniquely identify the device and avoid unauthorised device access to prevent fraud.</p>-->
						<!--<h3>Storage</h3>-->
						<!--<p>Allows to documents and pictures for the loan application.</p>-->
						<!--<h3>Camera</h3>-->
						<!--<p>Allows to capture images of documents and pictures for loan application.</p>-->
						<h3>Thank you for registering with us. Please click on the link below to start filling your Loan Application.</h3>
					</div>
				</div>
				<div class="safe-context">
					<p>By Allowing you agree to our <a href="{{ url('privacy-policy') }}" title="Privacy Policy">Privacy Policy</a> & <a href="{{ url('terms-condition') }}" title="Terms of Use">Terms of Use</a><br/> and to receive communication from AnyDay Money via SMS,<br/> Email and WhatsApp.</p>
					<div class="form-action">
						<input type="button" class="get-started" title="Submit" name="submit" value="LET’S GET STARTED">
					</div>
					<p>Please note that some of the information required for credit assessment are securely shared with our third-party service provider</p>
				</div>
			</div>
			<!-- end of login-form -->
			
		</div>
	</div>
	<div class="left">
		<div class="inner-sec">
			
			<!-- 	<img src="images/login-img.png" title="" alt="" /> -->
		</div>
	</div>
	
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
	$('.get-started').click(function(event) {
		window.location.href = "{{ url('apply-now') }}";
	});
});
</script>
@endsection