@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details sanction-cover">
			

				<div class="header-sec">
					<h2>Sign Agreement</h2>
				</div>
				<div class="sanction-top">
					<h3>Sign Agreement </h3>
					
				</div>

				<div class="confirm-text-wrapper sanction-text">
					<div class="inner-sec">
						<p>
						These Standard Terms and Conditions shall, if relevant Application Form(s) so provide, be applicable to the Loan Facilities provided by the Lender to the Borrower(s)These Standard Terms and Conditions shall be read in conjunction with the relevant Application Form, Transaction Document(s) in relation with the respective Loan facility(s), as the case may be, and the all the information, terms and conditions as updated on official website www.iihfl.com from time to time, which may be incorporated herein by reference. 1. DEFINITIONS AND INTERPRETATION 1.1. In these Standard Terms and Conditions, unless there is anything repugnant to the subject or context thereof, the expression listed below shall have the following meaning: a) “Additional Interest” or “Default Interest” means interest levied by IIFL HFL (a) on delay in payment of the EMI or Pre-EMI or any other amounts due and payable under Transaction Documents by the Borrower to IIFL HFL; or (b) upon non-compliance of any of the covenants contained in the Transaction Documents by the Borrower/s. b) “Adjustable Interest Rate”/ “AIR” shall mean and include the variable and floating rate of interest with reference to the Base rate of IIFL HFL together with the margin, if any, as specified by IIFL HFL and set out hereinafter, applicable on the Loan pursuant to Transaction
Documents. c) “Agreement” means Transaction<br/> Documents read in conjunction with each other together with the 
                                                 Schedules hereunder written
                                                 and any amendment made there
                                                 to from, if any, furnished by the
                                                 Borrower g)</p>
                           <div class="signature">Your Signature</div>                      
					</div>
				</div>
				<form method="post" id="login-form" class="login-form" action="{{ url($data['url']) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="applicant_code" value="{{ isset($data['personal']['applicant_code'])?$data['personal']['applicant_code']:'' }}">
                    <input type="hidden" name="loan_app_no" value="{{ isset($data['personal']['loan_app_no'])?$data['personal']['loan_app_no']:'' }}">
                    
                    <input type="hidden" name="redirect_url" value="{{ isset($data['redirect_url'])?$data['redirect_url']:'' }}">
                    <input type="hidden" name="platform" value="{{ isset($data['platform'])?$data['platform']:'' }}">
                    
				<div class="sanction-context">
					<p class="note"><input type="checkbox" id="terms-con" title="" name="terms-con" required=""><label for="terms-con">I have read and  understood the terms and conditions for electronic signature on agreement and agree to abide by them.</label></p>
					<div class="form-action">
	                        <input type="submit" title="Submit" name="submit" value="Continue">
	                </div>
	                
            	</div>
            	</form>


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
<!-- end of login-wrapper -->


@endsection
@section('script')
<script>
    $("#phase").click(function(){
        if($("#terms-con").prop('checked') == true){
            window.location.href='sign-agreement-form';
        }
    });
</script>
<script>

$.fn.equalHeights = function(){
	var max_height = 0;
	$(this).each(function(){
		max_height = Math.max($(this).height(), max_height);
	});
	$(this).each(function(){
		$(this).height(max_height);
	});
};

$(document).ready(function(){
$('.left, .right').equalHeights();  

 });   
$(window).resize(function(){
    $('.left, .right').equalHeights();
});


</script>
@endsection