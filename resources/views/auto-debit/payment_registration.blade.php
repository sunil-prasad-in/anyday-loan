@extends('user.include.app')
@section('content')



<div class="login-wrapper pay-ragis-details">
	<div class="right">
		<div class="inner-sec">
			<div class="details address-details-cover">
				
				<div class="header-sec">
					<h2>Payment Registration</h2>
				</div>
				<!-- end of header-sec -->

				<div class="deatils-form">
					
					<!--<form method="post" id="login-form" class="login-form" action="{{ url('payment-registration-fill') }}">-->
					    <form method="post" id="login-form" class="login-form" action="{{ url($data['payloads']) }}">
					    
					    <!--action="employment-info.html"-->
                    {{ csrf_field() }}
                    <input type="hidden" name="applicant_code" value="{{ isset($data['personal']['applicant_code'])?$data['personal']['applicant_code']:'' }}">
                    <input type="hidden" name="loan_app_no" value="{{ isset($data['personal']['loan_app_no'])?$data['personal']['loan_app_no']:'' }}">
                    
                    <input type="hidden" name="redirect_url" value="{{ isset($data['redirect_url'])?$data['redirect_url']:'' }}">
                    <input type="hidden" name="platform" value="{{ isset($data['platform'])?$data['platform']:'' }}">
                    
					 <div class="form-box half select">
					    <!--<label>Start Date</label>-->
                        <select>
                       	  <option selected="1" disabled>{{ $data['payload']['PaymentInstructionStartDateTime'] }}</option>
                       </select>                         
                    </div>	

                    <div class="form-box half select">
                        <select>
                       	  <!--<option selected="1">End Date</option>-->
                       	 <option selected="1" disabled>{{ $data['payload']['PaymentInstructionEndDateTime'] }}</option>
                       </select>                         
                    </div>	

                    <div class="form-box half select">
                        <select>
                       	  <!--<option selected="1">Amount Type</option>-->
                       	  <option selected="1" disabled>{{ $data['payload']['setPaymentTransactionCurrency'] }}</option>
                       </select>                         
                    </div>	

                    <div class="form-box half select">
                        <select>
                       	  <!--<option selected="1">Frequency</option>-->
                       	 <option selected="1" disabled>{{ $data['payload']['setPaymentInstructionFrequency'] }}</option>
                       </select>                         
                    </div>	

					<div class="form-box half">
                        <input type="text" title="Amount To Be Debited" name="amount-debit" placeholder="Amount To Be Debited" required="">                        
                    </div>	
					<div class="form-box half">
                        <input type="text" title="Utility Number" name="utility-number" placeholder="Utility Number" required="">                        
                    </div>
                   
                    <p class="field-para">REGISTER MANDATE USING ACCOUNT</p>
                    <div class="form-box half">
                        <input type="text" title="Bank" name="bank" placeholder="Bank" required="" readonly value="{{ $data['payload']['BankName'] }}">                        
                    </div>

                     <div class="netbanking-sec">
	                    	<div class="title-cover">
	                    		<p class="field-para net-bank-link"><img src="{{ asset('assets/images/netbanking-icon.png') }}" title="" alt="" /> Net Banking</p>
	                    	</div>
	                <div class="payment-field-cover">    	

		                 <div class="form-box half">
	                        <input type="text" title="Account Holder Name" name="holder-name" placeholder="Account Holder Name" required="" readonly value="{{ $data['payload']['ConsumerAccountHolderName'] }}">                        
	                    </div>	
						<div class="form-box half">
	                        <input type="text" title="Account Number" name="utility-number" placeholder="Account Number" required="" readonly value="{{ $data['payload']['BankAccountNumber'] }}">                        
	                    </div>   	
	                     <div class="form-box half select">
	                        <select>
	                       	  <!--<option selected="1">Select Account Type</option>-->
	                       	 <option selected="1" disabled>{{ $data['payload']['ConsumerAccountType'] }}</option>
	                       </select>                         
	                    </div>	
	                     <div class="form-box half">
	                        <input type="text" title="Phone Number" name="phone-number" placeholder="Phone Number" required="" readonly value="{{ $data['payload']['ConsumerMobileNumber'] }}">                        
	                    </div>	
						<div class="form-box half">
	                        <input type="text" title="Mobile Number" name="mobile-number" placeholder="Mobile Number" required="" readonly value="{{ $data['payload']['ConsumerMobileNumber'] }}">                        
	                    </div>   	
	                     <div class="form-box half">
	                        <input type="text" title="PAN Number" name="pan-number" placeholder="PAN Number" required="" readonly>                        
	                    </div>	
						<div class="form-box half">
	                        <input type="text" title="Email Address" name="email" placeholder="Email Address" required="" readonly value="{{ $data['payload']['ConsumerEmailID'] }}">                        
	                    </div>   
	                    </div>
	                     <!-- end of payment-field-cover-->	

	                </div>
	                <!-- end of netbanking-sec -->

                    <div class="form-action">
                        <input type="submit" title="Submit" name="submit" value="Register Now">
                    </div>


				</form>
				</div>

			</div>
			<!-- end of verification-cover -->			
		</div>
	</div>
	<div class="left">
		<div class="inner-sec">
		
				<!-- <img src="images/login-img.png" title="" alt="" /> -->
		</div>
	</div>
	
</div>
<!-- end of login-wrapper -->


@endsection
@section('script')
<script>
$(document).ready(function(){
  $(".address-details-cover .form-action input").click(function(){
    $(".details-step").addClass("adress-sec");
     $(".profileimg").hide();
     $(".checkimg").show();
  });

   $(".perma-tab").click(function(){
    $(this).toggleClass("active");
    $(".permanennt-address").toggle();

  });

   /*js for net banking*/
   $(".net-bank-link").click(function(){    
    $(".payment-field-cover").fadeToggle();
  });
});
</script>
<script>
    $("#phase").click(function(){
        window.location.href='dashboard/';
    });
</script>
<script>
	$(document).ready(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight + 15);
});

	$(window).onload(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight + 15);
});

	$(window).resize(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight + 15);
});
</script>
@endsection